
<?php
include('../db.php'); // Include your database connection file

if (isset($_GET['auth'])) {
    $auth = base64_decode($_GET['auth']);

    // Perform the database query
    $query = "SELECT * FROM `users` WHERE otp = '$auth'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // User authenticated, allow access to the page
        // Continue displaying the content of this page
    } else {
        // User not authenticated, redirect to main index.php
        header("Location: ../index.php");
        exit();
    }
} else {
    // 'auth' parameter not present, redirect to main index.php
    header("Location: ../index.php");
    exit();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Split Screen Login Page</title>
</head>
<body  style="background-color:#f9f9f9 !important">
    <div class="left-side">
        <img src="../public/Image/Wall.jpg" alt="Background image" class="background-image">
       
    </div>
    <div class="right-side">
    <div style="background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
    <form class="login-form" id="login-form" method="post" onsubmit="return validatePasswords()">
  <h2 class="form-title">Change Password</h2>
  <label for="email" style="display: block; margin-bottom: 5px;">New Password</label>
  <input name="password" type="password" id="email" placeholder="Password" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
  <label for="password" style="display: block; margin-bottom: 5px;">Confirm Password</label>
  <input name="confirmpassword" type="password" id="password" placeholder="Confirm Password" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">

  <button type="submit" class="login-button">Submit</button>
</form>

  <div id="result" class="result"></div>
</div>





    </div>
</body>
<script>
    var authValue = "<?php echo $_GET['auth']; ?>";
    </script>
<script src="js/newpass.js"></script>
</html>
