<?php
include('../../db.php'); // Include your database connection file

$otp = $_POST['OTP']; // Decoding 'auth' parameter, defaulting to empty string if not present
$newPassword = $_POST['password'] ?? ''; // Get the new password from POST data, defaulting to empty string if not present

// Update query to set the new password where the OTP matches
$updateQuery = "UPDATE users 
                SET password = '$newPassword' 
                WHERE otp = '$otp'";

// Perform the update query
$result = mysqli_query($conn, $updateQuery);

if ($result && mysqli_affected_rows($conn) > 0) {
    echo "next";
} else {
    echo $updateQuery;
}

// Close the database connection
mysqli_close($conn);
?>
