<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
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

      /* Style the result div */
      #result {
        width: 300px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f5f5f5;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <h1>Login</h1>
    <form id="login-form" method="post">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username"><br>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password"><br>
      <input type="submit" value="Login">
    </form>

    <div id="result"></div>

    <script>
      // Get the form element
      var loginForm = document.getElementById("login-form");

      // Add an event listener for when the form is submitted
      loginForm.addEventListener("submit", function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Get the form data
        var formData = new FormData(loginForm);

        // Send an AJAX request to the server
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "function.php");
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            // Update the result div with the response from the server
            document.getElementById("result").innerHTML = xhr.responseText;
            if (xhr.responseText === "success") {
              // Redirect to ../Admin/index.php
              window.location.href = "../Admin/index.php";
            }
          }
        };
        xhr.send(formData);
      });
    </script>
  </body>
</html>
