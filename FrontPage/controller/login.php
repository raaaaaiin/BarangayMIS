<?php
// Include the database configuration
include('../../db.php');

// Start a session
session_start();

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve the username and password from the form
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // Check if the username and password are valid
  $query = "SELECT * FROM login_acc WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    // The user's credentials are valid
    $user = mysqli_fetch_assoc($result);
    
    // Store the role in session
    $_SESSION['role'] = $user['role'];
    
    // Retrieve everything from 'users' where id matches the login_acc id
    $query = "SELECT * FROM users WHERE id = " . $user['id'];
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 1) {
      $user_info = mysqli_fetch_assoc($result);
      
      // Store user info in session
      $_SESSION['user_info'] = $user_info;
      
      echo $user['role'];
    } else {
      echo 'No user found with given id';
    }
    
  } else{
    echo 'failed';
  }
}

// Close the database connection
mysqli_close($conn);
?>
