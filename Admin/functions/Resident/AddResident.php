<?php
// Include the database connection file
include "../../../db.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Step 1: User Information
    

    // Step 3: Resident Information (Final Step)
    if ($_POST["step"] === "step3") {
        $email = $_POST["email"]; //
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Insert the user information into the `users` table
        $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
        mysqli_query($conn, $sql);

        // Retrieve the last inserted ID
        $user_id = mysqli_insert_id($conn);

        // Store the user ID in a ses
        $firstname = $_POST["firstname"]; //
        $middlename = $_POST["middlename"]; //
        $lastname = $_POST["lastname"]; //
       


        $suffix = $_POST["suffix"];
        $birth_date = $_POST["birth_date"];
        $civil_status = $_POST["civil_status"];
        $contact_no = $_POST["contact_no"];
        $gender = $_POST["gender"];
        $occupation = $_POST["occupation"];




       
        // Update the user details in the `users` table
       
        $housenumber = $_POST["housenumber"];
        $street = $_POST["street"];
        $barangay = $_POST["barangay"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $zip = $_POST["zip"];

        // Insert the resident information into the `resident_info` table
        $sql = "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', housenumber='$housenumber', street='$street', barangay='$barangay', city='$city', state='$state', zip='$zip', phone='$phone', dob='$dob', gender='$gender', occupation='$occupation' WHERE id='$user_id'";
        mysqli_query($conn, $sql);
        var_dump($_POST);
        $sql = "INSERT INTO resident_info (id, first_name, last_name, middle_name, suffix, birthdate, civil_status, contact_no, email, address) VALUES ('$user_id', '$first_name', '$last_name', '$middle_name', '$suffix', '$birth_date', '$civil_status', '$contact_no', '$resident_email', '$address')";
        mysqli_query($conn, $sql);
        var_dump($_POST);
        // Redirect or display a success message
        echo '<script>alert("Resident information successfully submitted!");</script>';
       // echo '<script>';
//echo 'window.location.href = "resident.php";'; // Redirect to a specific page
//echo '</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Resident</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-container {
            display: flex;
            justify-content: flex-end;
        }

        .btn-container button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-container button:not(:last-child) {
            margin-right: 10px;
        }

        /* Step Containers */
        .step-container {
            display: none;
        }

        .step-container.active {
            display: block;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div id="step1" class="step-container active">
                <h2>Step 1: User Information</h2>
                <label>Email:</label>
                <input type="email" name="email" required>
                <label>Username:</label>
                <input type="text" name="username" required>
                <label>Password:</label>
                <input type="password" name="password" required>
                <div class="btn-container">
                    <button type="button" onclick="nextStep('step2', 'step1')">Next</button>
                </div>
                <input type="hidden" name="step" value="step1">
            </div>

            <div id="step2" class="step-container">
                <h2>Step 2: User Details</h2>
                <label>First Name:</label>
                <input type="text" name="firstname" required>
                <label>Middle Name:</label>
                <input type="text" name="middlename" required>
                <label>Last Name:</label>
                <input type="text" name="lastname" required>
                <label>Suffix:</label>
                <input type="text" name="suffix" required>
                <label>Birth Date:</label>
                <input type="date" name="birth_date" required>
                <label>Civil Status:</label>
                <input type="text" name="civil_status" required>
                <label>Contact No:</label>
                <input type="text" name="contact_no" required>
                <label>Gender:</label>
                <select name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <label>Occupation:</label>
                <input type="text" name="occupation" required>
                <div class="btn-container">
                    <button type="button" onclick="prevStep('step1', 'step2')">Previous</button>
                    <button type="button" onclick="nextStep('step3', 'step2')">Next</button>
                </div>
                <input type="hidden" name="step" value="step2">
            </div>

            <div id="step3" class="step-container">
      
                <h2>Step 3: Resident Information</h2>
                
              



                <label>House Number:</label>
                <input type="text" name="housenumber" required>
                <label>Street:</label>
                <input type="text" name="street" required>
                <label>Barangay:</label>
                <input type="text" name="barangay" required>
                <label>City:</label>
                <input type="text" name="city" required>
                <label>State:</label>
                <input type="text" name="state" required>
                <label>ZIP:</label>
                <input type="text" name="zip" required>
                <div class="btn-container">
                    <button type="button" onclick="prevStep('step2', 'step3')">Previous</button>
                    <button type="submit">Submit</button>
                </div>
                <input type="hidden" name="step" value="step3">
            </div>
        </form>

        <script>
            function nextStep(nextStepId, currentStepId) {
                document.getElementById(currentStepId).classList.remove("active");
                document.getElementById(nextStepId).classList.add("active");
            }

            function prevStep(prevStepId, currentStepId) {
                document.getElementById(currentStepId).classList.remove("active");
                document.getElementById(prevStepId).classList.add("active");
            }
        </script>
    </div>
</body>

</html>
