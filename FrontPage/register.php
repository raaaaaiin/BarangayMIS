<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Website</title>
	<link rel="stylesheet" href="css/register.css">
</head>
<body style="background-color:#f9f9f9 !important">
	

<main>
<form id="register-form" method="POST">

  <section id="account-credentials">
    <h2>Account Credentials</h2>
      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email" required>

      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <button type="button" id="next-btnfirst">Next</button>
    
  </section>

  <section id="primary-information">
    <h2>Primary Information</h2>
    
      <label for="firstname">First Name:</label>
      <input type="text" id="firstname" name="firstname" required>

      <label for="middlename">Middle Name:</label>
      <input type="text" id="middlename" name="middlename">

      <label for="lastname">Last Name:</label>
      <input type="text" id="lastname" name="lastname" required>

      <label for="housenumber">House Number:</label>
      <input type="text" id="housenumber" name="housenumber" required>

      <label for="street">Street:</label>
      <input type="text" id="street" name="street" required>

      <label for="barangay">Barangay:</label>
      <input type="text" id="barangay" name="barangay" required>

      <label for="city">City/Municipality:</label>
      <input type="text" id="city" name="city" required>

      <label for="state">Province:</label>
      <input type="text" id="state" name="state" required>

      <label for="zip">Zip Code:</label>
      <input type="text" id="zip" name="zip" required>

      <button type="button" id="prev-btn">Previous</button>
      <button type="button" id="next-btn">Next</button>

  </section>

  <section id="secondary-information">
    <h2>Secondary Information</h2>
    
      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone" required>

      <label for="dob">Date of Birth:</label>
      <input type="date" id="dob" name="dob" required>

      <label for="gender">Gender:</label>
      <select id="gender" name="gender" required>
        <option value="" disabled selected>Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>

      <label for="occupation">Occupation:</label>
      <input type="text" id="occupation" name="occupation" required>

      <button type="button" id="prev-btn">Previous</button>
      <button type="submit" id="submit-btn">Submit</button>
   
  </section>
  </form>
</main>


	<script src="js/register.js"></script>
</body>
</html>
