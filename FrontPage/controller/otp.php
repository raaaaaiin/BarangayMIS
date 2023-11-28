<?php
include('../../db.php'); // Include your database connection file

$otp = $_POST['OTP'] ?? ''; // Get the OTP from POST data, defaulting to an empty string if not provided

// Check if the OTP exists in the 'users' table
$checkQuery = "SELECT * FROM users WHERE otp = '$otp'";
$result = mysqli_query($conn, $checkQuery);

if ($result && mysqli_num_rows($result) > 0) {
    // OTP exists in 'users' table
    echo "$otp";
    
} else {
    // Incorrect or invalid OTP
    echo "Incorrect or Invalid OTP.";
}

// Close the database connection
mysqli_close($conn);
?>
