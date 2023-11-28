var loginForm = document.getElementById("login-form");
function validatePasswords() {
  const passwordField = document.getElementById('email');
  const confirmPasswordField = document.getElementById('password');
  
  if (passwordField.value !== confirmPasswordField.value) {
    // Add a red border to indicate mismatch
    passwordField.style.borderColor = 'red';
    confirmPasswordField.style.borderColor = 'red';

    // Display a message to indicate mismatch
    alert('Passwords do not match!');
    
    return false; // Prevent form submission
  } else {
    passwordField.style.borderColor = '';
    confirmPasswordField.style.borderColor = '';

    // If passwords match, programmatically submit the form
    var formData = new FormData(loginForm);
    formData.append('OTP', atob(authValue));

    // Send an AJAX request to the server
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "controller/newpass.php");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Update the result div with the response from the server
        if (xhr.responseText === "next") {
          parent.location.href = "../../index.php";
          alert("Password has been updated successfully. You may now log in.");
        }
      }
    };
    xhr.send(formData);

    return false; // Prevent default form submission
  }
}
