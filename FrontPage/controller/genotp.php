<?php
// Include the database configuration
// Include database connection
include('../../db.php');

// Get the validator from POST data
$validator = $_POST['username'];

// Generate a 6-digit OTP
$newOTP = sprintf("%06d", mt_rand(1, 999999));

// Update query to set the new OTP if the OTP value is null or empty for the specified email, username, or phone
$updateQuery = "UPDATE users 
                SET otp = '$newOTP',
                otp_updated_timestamp = NOW() 
                WHERE (email = '$validator' OR username = '$validator' OR phone = '$validator')";

// Perform the update query
$result = mysqli_query($conn, $updateQuery);

if ($result && mysqli_affected_rows($conn) > 0) {
    // Select query to fetch the phone number based on the validator
    $selectQuery = "SELECT phone FROM users 
                    WHERE (email = '$validator' OR username = '$validator' OR phone = '$validator')";
    

    // Perform the select query
    $selectResult = mysqli_query($conn, $selectQuery);

    if ($selectResult && mysqli_num_rows($selectResult) > 0) {
        // Fetch the phone number from the query result
        $row = mysqli_fetch_assoc($selectResult);
        $updatedPhone = $row['phone'];
$blurredPhone = substr($updatedPhone, 0, 4) . 'XXXXXXX' . substr($updatedPhone, 9);

        // Store the anonymized phone number in local storage named 'phone'
        
        // Prepare and execute the SMS message insertion query
        $messconti = "Your OTP is $newOTP. Code will expire in 5 minutes. \n\n Sitio Igiban Services";
        $insertQuery = "INSERT INTO sms_messages (phone_number, message_content, send_date, sent_date, active_status)
                        VALUES ('$updatedPhone', '$messconti', NOW(), NULL, 0)";
        
        mysqli_query($conn, $insertQuery);
        
        $data = array(
            'otp' => $newOTP,
            'blurred_phone' => $blurredPhone
        );
    
        // Output the array as JSON
        echo json_encode($data); // Output the OTP
    } else {
        echo "No Phone number registered or dual registered, please go to barangay to fix this.";
    }
} else {
    echo "Invalid Credentials";
}

// Close the database connection
mysqli_close($conn);
?>
