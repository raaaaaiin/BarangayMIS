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

sql
