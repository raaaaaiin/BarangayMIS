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
        <img src="https://scontent.fmnl25-2.fna.fbcdn.net/v/t1.15752-9/338990456_1237279880514780_2488969850375586482_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=ae9488&_nc_ohc=2tn84o02ONwAX9Fte-w&_nc_ht=scontent.fmnl25-2.fna&oh=03_AdQCHzwG733XEY9NQEjO1KpOWBypcMotrSnq_crIvM3V1w&oe=64663CD7" alt="Background image" class="background-image">
       
    </div>
    <div class="right-side">
    <div style="background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
  <form class="login-form" id="login-form" method="post">
    <h2 class="form-title">Log In</h2>
    <label for="email" style="display: block; margin-bottom: 5px;">Ema address</label>
    <input name="username" type="text" id="email" placeholder="Email" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
    <label for="password" style="display: block; margin-bottom: 5px;">Password</label>
    <input name="password" type="password" id="password" placeholder="Password" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
    <a href="#" class="forgot-password" style="display: block; text-align: right; margin-bottom: 10px;">Forgot password?</a>
    <button type="submit" class="login-button" >Log In</button>
  </form>
  <div id="result" class="result"></div>
</div>





    </div>
</body>
<script src="js/login.js"></script>
</html>
