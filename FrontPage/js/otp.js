var loginForm = document.getElementById("login-form");

// Add an event listener for when the form is submitted
loginForm.addEventListener("submit", function(event) {
  // Prevent the default form submission behavior
  event.preventDefault();

  // Get the form data
  var formData = new FormData(loginForm);
  // Send an AJAX request to the server
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "controller/otp.php");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Update the result div with the response from the server
      
  
      if(xhr.responseText.length === 6){
        parent.location.href = "newpass.php?auth="+btoa(xhr.responseText) ;
        }else{
          document.getElementById('feedback').innerHTML = xhr.responseText + ' <br><br>';
        }
      
    }
  };
  xhr.send(formData);
});