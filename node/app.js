
const express = require('express');
const serialportgsm = require('serialport-gsm');
const mysql = require('mysql');
const app = express();
const modem = serialportgsm.Modem();
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'barangaymis',
    port: 3306
});

let options = {
    baudRate: 9600,
    dataBits: 8,
    stopBits: 1,
    parity: 'none',
    rtscts: false,
    xon: true,
    xoff: false,
    xany: false,
    autoDeleteOnReceive: true,
    enableConcatenation: true,
    pin: '',
    customInitCommand: '',
    cnmiCommand: 'AT+CNMI=2,1,0,2,1',
    logger: console
};
modem.open('COM3', options, (err) => {
    if (err) {
        console.error('Error opening modem:', err);
        return;
    }
    console.log('Modem initialized');
});

function normalizePhoneNumber(phoneNumber) {
    if (phoneNumber.startsWith('09')) {
        return '639' + phoneNumber.slice(2);
    } else if (phoneNumber.startsWith('+63')) {
        return '63' + phoneNumber.slice(3);
    } else if (phoneNumber.startsWith('+09')) {
        return '639' + phoneNumber.slice(3);
    } else {
        // For any other cases, return the original number
        return phoneNumber;
    }
}
function updateExpiredOTP() {
    connection.query(`
        UPDATE users
        SET otp = NULL
        WHERE otp IS NOT NULL
          AND otp_updated_timestamp <= NOW() - INTERVAL 5 MINUTE;
    `, (error, results, fields) => {
        if (error) {
            console.error('Error updating expired OTP:', error);
        } else {
            console.log('Expired OTPs updated successfully.');
        }
    });
}

function sendUnsentMessages() {
    connection.query("SELECT * FROM sms_messages WHERE active_status = 0", (error, results, fields) => {
        if (error) throw error;

        results.forEach(message => {
            const phoneNumber = normalizePhoneNumber(message.phone_number);
            const messageContent = message.message_content;

            modem.sendSMS(
                phoneNumber,
                messageContent,
                false, // Set as true for the whole message
                response => {
                    console.log(response);

                    if (response.data && response.data.response === 'Message Successfully Sent') {
                        const currentDate = new Date().toISOString().slice(0, 19).replace('T', ' ');

                        connection.query("UPDATE sms_messages SET active_status = 1, send_date = ? WHERE id = ?", [currentDate, message.id], (updateError, updateResults, updateFields) => {
                            if (updateError) throw updateError;
                            console.log(`Message with Message ID ${message.id} sent successfully.`);
                        });
                    }
                },
                'Sitio Igiban Services'
            );
        });
    });
}



modem.on('open', () => {
    sendUnsentMessages(); // Send initially
    setInterval(sendUnsentMessages, 5000);
    setInterval(updateExpiredOTP, 5000); // Check every 30 seconds
});