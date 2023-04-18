<?php
// Include the database configuration
include('../../db.php');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve the username and password from the form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Check if the username and password are valid
  $query = "SELECT * FROM login_acc WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    // The user's credentials are valid, return a success message
    echo 'success';
  } else{
    echo 'failed';
  }
}

// Close the database connection
mysqli_close($conn);
?>
