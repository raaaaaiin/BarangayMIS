var loginForm = document.getElementById("login-form");

// Add an event listener for when the form is submitted
loginForm.addEventListener("submit", function(event) {
  // Prevent the default form submission behavior
  event.preventDefault();

  // Get the form data
  var formData = new FormData(loginForm);

  // Send an AJAX request to the server
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "controller/login.php");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Update the result div with the response from the server
      
      if (xhr.responseText === "success") {
        // Redirect to ../Admin/index.php
        parent.location.href = "../Admin/index.php";
      }else{
        alert("Invalid Credentials!");
      }
    }
  };
  xhr.send(formData);
});