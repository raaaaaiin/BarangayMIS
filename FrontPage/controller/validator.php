<?php
// Include the database connection
include('../../db.php');

// Get user input
$email = $_POST['email'];
$username = $_POST['username'];

// Initialize an array to store validation errors
$errors = array();

// Check if the email is already registered
$sql = "SELECT email FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $errors['email'] = "Email is already registered.";
}

// Check if the username is already registered
$sql = "SELECT username FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $errors['username'] = "Username is already registered.";
}

// Return the validation errors as JSON
echo json_encode($errors);

// Close the database connection
mysqli_close($conn);
?>
