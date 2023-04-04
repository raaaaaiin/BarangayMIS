<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
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
          }
        };
        xhr.send(formData);
      });
    </script>
  </body>
</html>
