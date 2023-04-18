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
		<section id="account-credentials">
			<h2>Account Credentials</h2>
			<form>
				<label for="email">Email Address:</label>
				<input type="email" id="email" required>

				<label for="username">Username:</label>
				<input type="text" id="username" required>

				<label for="password">Password:</label>
				<input type="password" id="password" required>

				<button type="button" id="next-btn">Next</button>
			</form>
		</section>

		<section id="primary-information">
			<h2>Primary Information</h2>
			<form>
				<label for="fullname">Full Name:</label>
				<input type="text" id="fullname" required>

				<label for="address">Address:</label>
				<input type="text" id="address" required>

				<label for="city">City:</label>
				<input type="text" id="city" required>

				<label for="state">State:</label>
				<input type="text" id="state" required>

				<label for="zip">Zip Code:</label>
				<input type="text" id="zip" required>

				<button type="button" id="prev-btn">Previous</button>
				<button type="button" id="next-btn">Next</button>
			</form>
		</section>

		<section id="secondary-information">
			<h2>Secondary Information</h2>
			<form>
				<label for="phone">Phone Number:</label>
				<input type="tel" id="phone" required>

				<label for="dob">Date of Birth:</label>
				<input type="date" id="dob" required>

				<label for="gender">Gender:</label>
				<select id="gender" required>
					<option value="" disabled selected>Select Gender</option>
					<option value="male">Male</option>
					<option value="female">Female</option>
					<option value="other">Other</option>
				</select>

				<label for="occupation">Occupation:</label>
				<input type="text" id="occupation" required>

				<button type="button" id="prev-btn">Previous</button>
				<button type="submit" id="submit-btn">Submit</button>
			</form>
		</section>
	</main>

	<script src="js/register.js"></script>
</body>
</html>
