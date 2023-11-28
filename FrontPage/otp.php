<!DOCTYPE html>
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
  <form class="login-form" id="login-form" method="post">
    <h2 class="form-title">Enter OTP</h2>
    <label for="email" style="display: block; margin-bottom: 5px;">One Time Pin is sent to <?php echo base64_decode($_GET['contact'])?></label>
    <input name="OTP" type="text" id="email" placeholder="OTP" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
   <span style="color:red" id="feedback"></span>
    <button type="submit" class="login-button" >Submit</button>
  </form>
  <div id="result" class="result"></div>
</div>





    </div>
</body>

<script src="js/otp.js"></script>
</html>
