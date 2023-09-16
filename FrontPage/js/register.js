const accountCredentialsSection = document.getElementById("account-credentials");
const primaryInformationSection = document.getElementById("primary-information");
const secondaryInformationSection = document.getElementById("secondary-information");

const nextBtns = document.querySelectorAll("#next-btn");
const prevBtns = document.querySelectorAll("#prev-btn");


for (let i = 0; i < nextBtns.length; i++) {
  nextBtns[i].addEventListener("click", function() {
  if (i === 0) {
  accountCredentialsSection.style.display = "none";
  primaryInformationSection.style.display = "block";
  } else {
  primaryInformationSection.style.display = "none";
  secondaryInformationSection.style.display = "block";
  }
  });
  }
  
  for (let i = 0; i < prevBtns.length; i++) {
  prevBtns[i].addEventListener("click", function() {
  if (i === 0) {
  primaryInformationSection.style.display = "none";
  accountCredentialsSection.style.display = "block";
  } else {
  secondaryInformationSection.style.display = "none";
  primaryInformationSection.style.display = "block";
  }
  });
  }
  
document.querySelector('#register-form').addEventListener('submit', function(event) {
    event.preventDefault();

    // Get the form data
    var formData = new FormData(event.target);
  
    // Send an AJAX request to the server
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "controller/register.php");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Update the result div with the response from the server
        if (xhr.responseText === "success") {
          // Redirect to ../Admin/index.php
          alert("Registered!");
          location.reload();
        }else{
          alert(xhr.responseText);
        }
      }
    };
    xhr.send(formData);
});


document.addEventListener('DOMContentLoaded', function () {
  const nextButton = document.getElementById('next-btnfirst');
  const emailInput = document.getElementById('email');
  const usernameInput = document.getElementById('username');

  nextButton.addEventListener('click', function () {

      // Validate email and username via AJAX
      fetch('controller/validator.php', {
          method: 'POST',
          body: new FormData(document.getElementById('register-form')),
      })
          .then(response => response.json())
          .then(data => {
              // Check for email and username errors
              if (data.email) {
                  emailInput.classList.add('error');

                  alert("Email already exists");
                  // Display the email error message (data.email) to the user
              } else {
                  emailInput.classList.remove('error');
              }

              if (data.username) {
                  usernameInput.classList.add('error');
                  alert("Username already exists");
                  // Display the username error message (data.username) to the user
              } else {
                  usernameInput.classList.remove('error');
              }

              // Proceed with the form only if there are no errors
              if (!data.email && !data.username) {
               
  accountCredentialsSection.style.display = "none";
  primaryInformationSection.style.display = "block";
              }
          })
          .catch(error => console.error(error));
          
  });
  
});
