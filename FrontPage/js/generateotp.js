var loginForm = document.getElementById("login-form");

// Add an event listener for when the form is submitted
loginForm.addEventListener("submit", function(event) {
  // Prevent the default form submission behavior
  event.preventDefault();

  // Get the form data
  var formData = new FormData(loginForm);

  // Send an AJAX request to the server
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "controller/genotp.php");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Update the result div with the response from the server
      if (isValidJson(xhr.responseText)) {
        response = JSON.parse(xhr.responseText);

        // Check if 'otp' property exists and its length is 6
        if (response.otp.length === 6) {
          parent.location.href = "otp.php?contact="+btoa(response.blurred_phone);
        } else {
          document.getElementById('feedback').innerHTML = xhr.responseText + '<br><br>'; // Displaying "Invalid OTP" in the span with ID "feedback"
      
        }
    }else{
      
        document.getElementById('feedback').innerHTML = xhr.responseText + '<br><br>'; // Displaying "Invalid OTP" in the span with ID "feedback"
    
    }
    }
  };
  xhr.send(formData);
});

function isValidJson(str) {
  try {
      JSON.parse(str);
      return true;
  } catch (e) {
      return false;
  }
}