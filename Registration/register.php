<!DOCTYPE html>
<html>
  <head>
    <title>User Registration</title>
    <style>
      /* Set the font family and font size for the entire page */
      body {
        font-family: Arial, sans-serif;
        font-size: 16px;
      }

      /* Style the form */
      form {
        width: 300px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f5f5f5;
      }

      form label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
      }

      form input[type="text"],
      form input[type="password"] {
        display: block;
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
      }

      form input[type="submit"] {
        display: block;
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #333;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
      }

      form input[type="submit"]:hover {
        background-color: #666;
      }
    </style>
  </head>
  <body>
    <h1>User Registration Form</h1>
    <form action="register.php" method="post">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username"><br>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password"><br>
      <label for="role">Role:</label>
      <input type="text" name="role" id="role"><br>
      <input type="submit" value="Register">
    </form>
  </body>
</html>
