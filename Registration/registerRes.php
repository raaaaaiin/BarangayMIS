<!DOCTYPE html>
<html>
  <head>
    <title>Resident Registration</title>
    <style>
      /* Set the font family and font size for the entire page */
      body {
        font-family: Arial, sans-serif;
        font-size: 16px;
      }

      /* Style the form */
      form {
        width: 500px;
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
      form input[type="date"],
      form input[type="email"] {
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
    <h1>Resident Registration Form</h1>
    <form action="register.php" method="post">
      <label for="id">ID:</label>
      <input type="text" name="id" id="id"><br>
      <label for="first_name">First Name:</label>
      <input type="text" name="first_name" id="first_name"><br>
      <label for="last_name">Last Name:</label>
      <input type="text" name="last_name" id="last_name"><br>
      <label for="middle_name">Middle Name:</label>
      <input type="text" name="middle_name" id="middle_name"><br>
      <label for="suffix">Suffix:</label>
      <input type="text" name="suffix" id="suffix"><br>
      <label for="gender">Gender:</label>
      <input type="text" name="gender" id="gender"><br>
      <label for="birthdate">Birthdate:</label>
      <input type="date" name="birthdate" id="birthdate"><br>
      <label for="civil_status">Civil Status:</label>
      <input type="text" name="civil_status" id="civil_status"><br>
      <label for="contact_no">Contact Number:</label>
      <input type="text" name="contact_no" id="contact_no"><br>
      <label for="email">Email:</label>
      <input type="email" name="email" id="email"><br>
      <label for="address">Address:</label>
      <input type="text" name="address" id="address"><br>
      <input type="submit" value="Register">
    </form>
  </body>
</html>
