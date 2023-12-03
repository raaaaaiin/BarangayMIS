<?php
include('../../db.php'); // Include your database connection file

$otp = $_POST['OTP']; // Decoding 'auth' parameter, defaulting to empty string if not present
$newPassword = $_POST['password'] ?? ''; // Get the new password from POST data, defaulting to empty string if not present

// Update query to set the new password where the OTP matches
$updateQuery = "UPDATE users 
                SET password = '$newPassword' 
                WHERE otp = '$otp';";

$updateQuery .= "UPDATE login_acc 
                 SET password = '$newPassword' 
                 WHERE id = (SELECT id FROM users WHERE otp = '$otp');";

$result = mysqli_multi_query($conn, $updateQuery);

if ($result) {
    // Query successful
} else {
    // Handle query failure
    echo "Error: " . mysqli_error($conn);
}


if ($result && mysqli_affected_rows($conn) > 0) {
    echo "next";
} else {
    echo $updateQuery;
}

// Close the database connection
mysqli_close($conn);
?>
