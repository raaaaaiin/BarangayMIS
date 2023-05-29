<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Barangay Staff</title>
    <style>
        /* Additional CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group select,
        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-submit {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php
    include_once '../../../db.php';

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $residentid = $_POST['resident_id'];
        $residentName = $_POST['resident_name'];
        $position = $_POST['position'];

        // Update the data in the database
        $query = "UPDATE barangay_staff SET resident_id='$residentid', position='$position', date_updated=NOW() WHERE id='$id'";
        mysqli_query($conn, $query);
        mysqli_close($conn);

        // Redirect to the show-staff.php page
        header('Location: show-staff.php');
        exit();
    }

    // Fetch the staff details from the database
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT
            barangay_staff.id,
            barangay_staff.resident_id,
            barangay_staff.position,
            barangay_staff.date_added,
            barangay_staff.date_updated,
            users.id,
            users.email,
            users.username,
            users.`password`,
            users.firstname,
            users.middlename,
            users.lastname,
            users.housenumber,
            users.street,
            users.barangay,
            users.city,
            users.state,
            users.zip,
            users.phone,
            users.dob,
            users.gender,
            users.occupation
            FROM
            barangay_staff
            INNER JOIN users ON barangay_staff.resident_id = users.id
            WHERE
            barangay_staff.id = '$id'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $residentId = $row['resident_id'];
            $residentName =  $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
            $position = $row['position'];
        } else {
            echo "No records found.";
            exit();
        }
    } else {
        echo "Invalid request.";
        exit();
    }
?>
    <div class="container">
        <h1 class="text-2xl font-bold mb-3">Edit Barangay Staff</h1>
        <form action="edit-staff.php" method="POST">
            <div class="form-group">
                <label for="resident_name">Resident:</label>
                <input type="text" id="resident_name" name="resident_name" value="<?php echo $residentName; ?>" required autocomplete="off" />
                <ul id="resident_name_list" class="autocomplete-options"></ul>
                <input type="hidden" id="resident_id" name="resident_id" value="<?php echo $residentId; ?>" />
                <input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>" />
            </div>
            <div class="form-group">
                <label for="position">Position:</label>
                <select id="position" name="position" required>
                    <option value="">Select Position</option>
                    <option value="Barangay Chairman" <?php if ($position === 'Barangay Chairman') echo 'selected'; ?>>Barangay Chairman</option>
                    <option value="Barangay Kagawad" <?php if ($position === 'Barangay Kagawad') echo 'selected'; ?>>Barangay Kagawad</option>
                    <option value="Barangay Secretary" <?php if ($position === 'Barangay Secretary') echo 'selected'; ?>>Barangay Secretary</option>
                    <option value="Barangay Treasurer" <?php if ($position === 'Barangay Treasurer') echo 'selected'; ?>>Barangay Treasurer</option>
                    <option value="Barangay SK Chairman" <?php if ($position === 'Barangay SK Chairman') echo 'selected'; ?>>Barangay SK Chairman</option>
                    <option value="Barangay SK Kagawad" <?php if ($position === 'Barangay SK Kagawad') echo 'selected'; ?>>Barangay SK Kagawad</option>
                    <option value="Barangay Tanod" <?php if ($position === 'Barangay Tanod') echo 'selected'; ?>>Barangay Tanod</option>
                    <option value="Barangay Health Worker" <?php if ($position === 'Barangay Health Worker') echo 'selected'; ?>>Barangay Health Worker</option>
                    <option value="Barangay Day Care Worker" <?php if ($position === 'Barangay Day Care Worker') echo 'selected'; ?>>Barangay Day Care Worker</option>
                    <option value="Barangay Livelihood Coordinator" <?php if ($position === 'Barangay Livelihood Coordinator') echo 'selected'; ?>>Barangay Livelihood Coordinator</option>
                    <option value="Barangay Environmental Officer" <?php if ($position === 'Barangay Environmental Officer') echo 'selected'; ?>>Barangay Environmental Officer</option>
                    <option value="Barangay Youth Development Officer" <?php if ($position === 'Barangay Youth Development Officer') echo 'selected'; ?>>Barangay Youth Development Officer</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn-submit">Update</button>
        </form>
    </div>

    <script>
        // Resident name input and autocomplete options list
        const residentNameInput = document.getElementById('resident_name');
        const residentNameList = document.getElementById('resident_name_list');
        const residentIdInput = document.getElementById('resident_id');

        // User data array
        const userData = [
            <?php
            $query = "SELECT id, firstname, middlename, lastname FROM users";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "{ id: " . $row['id'] . ", name: '" . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'] . "' },\n";
                }
            }
            ?>
        ];

        // Autocomplete function
        function autocompleteResidentName(input) {
            let matches = [];
            let results = '';

            if (input.value.length > 0) {
                matches = userData.filter(userData => {
                    const regex = new RegExp(`^${input.value}`, 'gi');
                    return userData.name.match(regex);
                });
            }

            results = matches.map(match => {
                const regex = new RegExp(`^${input.value}`, 'gi');
                const residentName = match.name.replace(regex, `<strong>${input.value}</strong>`);
                return `<li data-resident-id="${match.id}">${residentName}</li>`;
            }).join('');

            residentNameList.innerHTML = results;
        }

        // Handle resident name input event
        residentNameInput.addEventListener('input', () => {
            autocompleteResidentName(residentNameInput);
            residentNameList.classList.add('show');
        });

        // Handle click event on autocomplete option
        residentNameList.addEventListener('click', (e) => {
            const selectedLi = e.target;
            if (selectedLi.tagName === 'LI') {
                const residentId = selectedLi.getAttribute('data-resident-id');
                const residentName = selectedLi.textContent;
                residentIdInput.value = residentId;
                residentNameInput.value = residentName;
                residentNameList.classList.remove('show');
            }
        });

        // Hide autocomplete options when clicking outside the input and options
        document.addEventListener('click', (e) => {
            if (!residentNameList.contains(e.target) && e.target !== residentNameInput) {
                residentNameList.classList.remove('show');
            }
        });
    </script>
</body>
</html>
