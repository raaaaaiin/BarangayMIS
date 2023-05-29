<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Barangay Staff</title>
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

    $message = '';
    if (isset($_POST['submit'])) {
        $residentName = $_POST['resident_id'];
        $position = $_POST['position'];
          
        // Insert the data into the database
        $query = "INSERT INTO barangay_staff (resident_id, position, date_added, date_updated) VALUES ('$residentName', '$position', NOW(), NOW())";
        
        if (mysqli_query($conn, $query)) {
           
            $message = "Barangay staff created successfully.";
            

        } else {
            
            $message = "Error creating barangay staff: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
?>
    <div class="container">
        <h1 class="text-2xl font-bold mb-3">Create Barangay Staff</h1>
        <?php if ($message !== ''): ?>
            <div class="alert <?php echo $message === "Barangay staff created successfully." ? 'alert-success' : 'alert-danger'; ?> mb-3">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="create-staff.php" method="POST">
            <div class="form-group">
                <label for="resident_name">Resident:</label>
                <input type="text" id="resident_name" name="resident_name" required autocomplete="off" />
                <ul id="resident_name_list" class="autocomplete-options"></ul>
                <input type="hidden" id="resident_id" name="resident_id" />
            </div>
            <div class="form-group">
                <label for="position">Position:</label>
                <select id="position" name="position" required>
                    <option value="">Select Position</option>
                    <option value="Barangay Chairman">Barangay Chairman</option>
                    <option value="Barangay Kagawad">Barangay Kagawad</option>
                    <option value="Barangay Secretary">Barangay Secretary</option>
                    <option value="Barangay Treasurer">Barangay Treasurer</option>
                    <option value="Barangay SK Chairman">Barangay SK Chairman</option>
                    <option value="Barangay SK Kagawad">Barangay SK Kagawad</option>
                    <option value="Barangay Tanod">Barangay Tanod</option>
                    <option value="Barangay Health Worker">Barangay Health Worker</option>
                    <option value="Barangay Day Care Worker">Barangay Day Care Worker</option>
                    <option value="Barangay Livelihood Coordinator">Barangay Livelihood Coordinator</option>
                    <option value="Barangay Environmental Officer">Barangay Environmental Officer</option>
                    <option value="Barangay Youth Development Officer">Barangay Youth Development Officer</option>
                </select>
            </div>
            <input type="submit" name="submit" class="btn-submit" value="Create"></button>
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

        // Create select options
        const createSelectOptions = (data, selectElement) => {
            data.forEach(item => {
                const option = document.createElement('li');
                option.textContent = item.name;
                option.setAttribute('data-id', item.id);
                option.addEventListener('click', () => {
                    residentNameInput.value = item.name;
                    residentIdInput.value = item.id;
                    residentNameList.innerHTML = '';
                });
                residentNameList.appendChild(option);
            });
        };

        // Filter user data based on search value
        const filterUserData = searchValue => {
            const filteredData = userData.filter(item => {
                const fullName = item.name.toLowerCase();
                return fullName.includes(searchValue.toLowerCase());
            });

            return filteredData;
        };

        // Event listener for input changes
        residentNameInput.addEventListener('input', () => {
            const searchValue = residentNameInput.value.trim();
            const filteredData = filterUserData(searchValue);
            residentNameList.innerHTML = '';

            if (searchValue !== '') {
                createSelectOptions(filteredData, residentNameList);
            }
        });
    </script>
</body>
</html>
