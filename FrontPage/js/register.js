const accountCredentialsSection = document.getElementById("account-credentials");
const primaryInformationSection = document.getElementById("primary-information");
const secondaryInformationSection = document.getElementById("secondary-information");

const nextBtnFirst = document.getElementById("next-btnfirst");
const nextBtn = document.getElementById("next-btn");
const prevBtns = document.querySelectorAll("#prev-btn");

nextBtnFirst.addEventListener("click", function() {
    accountCredentialsSection.style.display = "none";
    primaryInformationSection.style.display = "block";
});

nextBtn.addEventListener("click", function() {
    primaryInformationSection.style.display = "none";
    secondaryInformationSection.style.display = "block";
});

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
            if (xhr.responseText === "success") {
                alert("Registered!");
                location.reload();
            } else {
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
        fetch('controller/validator.php', {
            method: 'POST',
            body: new FormData(document.getElementById('register-form')),
        })
        .then(response => response.json())
        .then(data => {
            if (data.email) {
                emailInput.classList.add('error');
                alert("Email already exists");
            } else {
                emailInput.classList.remove('error');
            }

            if (data.username) {
                usernameInput.classList.add('error');
                alert("Username already exists");
            } else {
                usernameInput.classList.remove('error');
            }

            if (!data.email && !data.username) {
                accountCredentialsSection.style.display = "none";
                primaryInformationSection.style.display = "block";
            }
        })
        .catch(error => console.error(error));
    });
});
