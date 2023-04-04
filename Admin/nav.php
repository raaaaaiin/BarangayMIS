<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>White Themed Nav Bar</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
    }
    .navtop {
      background-color: #ffffff;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      padding: 0 10px;
      height: 60px;
      font-size: 18px;
      color: #1877f2;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
      z-index: 1000;
    }
    .navtop li {
      padding: 0 10px;
    }
    .navtop a {
      color: #1877f2;
      text-decoration: none;
      display: inline-block;
      padding: 10px 15px;
      transition: color 0.3s;
      font-weight: 500;
      letter-spacing: 0.5px;
    }
    .navtop a:hover {
      color: #0f5ac1;
    }
  </style>
</head>
<body>
  <nav class="navtop">
    <a href="index.php" target="_Parent">Home</a>
    <a href="index.php#section2" target="_Parent">About</a>
    <a href="index.php#loc" target="_Parent">Contact</a>
    <a href="home.php" target="_Parent">Dashboard</a>
    <a href="accountLogout.php" target="_Parent">Log Out</a>
  </nav>
</body>
</html>
