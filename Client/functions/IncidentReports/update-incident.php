<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update Incident Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Update Incident Report</h1>
    <?php
    // Include the database connection file
    include_once '../../../db.php';

    // Check if the incident ID is provided in the URL parameter
    if (isset($_GET['id'])) {
        $incident_id = $_GET['id'];

        // Retrieve the incident report data from the database
        $sql = "SELECT * FROM resident_incident_report WHERE id = '$incident_id'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $resident_id = $row['resident_id'];
            $date_reported = $row['date_reported'];
            $time_reported = $row['time_reported'];
            $incident_type = $row['incident_type'];
            $incident_description = $row['incident_description'];
            $incident_location = $row['incident_location'];
            $incident_status = $row['incident_status'];
            $date_created = $row['date_created'];
            $date_updated = $row['date_updated'];

            // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Retrieve the updated form data
                $updated_resident_id = $_POST['resident_id'];
                $updated_date_reported = $_POST['date_reported'];
                $updated_time_reported = $_POST['time_reported'];
                $updated_incident_type = $_POST['incident_type'];
                $updated_incident_description = $_POST['incident_description'];
                $updated_incident_location = $_POST['incident_location'];
                $updated_incident_status = $_POST['incident_status'];

                // Update the incident report in the database
                $sql_update = "UPDATE resident_incident_report SET 
                    resident_id = '$updated_resident_id',
                    date_reported = '$updated_date_reported',
                    time_reported = '$updated_time_reported',
                    incident_type = '$updated_incident_type',
                    incident_description = '$updated_incident_description',
                    incident_location = '$updated_incident_location',
                    incident_status = '$updated_incident_status',
                    date_updated = NOW()
                    WHERE id = '$incident_id'";

                if ($conn->query($sql_update) === TRUE) {
                    echo '<p>Incident report updated successfully!</p>';
                } else {
                    echo '<p>Error updating incident report: ' . $conn->error . '</p>';
                }
            }
    ?>
            <form method="POST" action="">
                <label for="resident_id">Resident ID:</label>
                <input type="text" name="resident_id" id="resident_id" value="<?php echo $resident_id; ?>" required>
                <label for="date_reported">Date Reported:</label>
                <input type="text" name="date_reported" id="date_reported" value="<?php echo $date_reported; ?>" required>
                <label for="time_reported">Time Reported:</label>
                <input type="text" name="time_reported" id="time_reported" value="<?php echo $time_reported; ?>" required>
                <label for="incident_type">Incident Type:</label>
                <input type="text" name="incident_type" id="incident_type" value="<?php echo $incident_type; ?>" required>
                <label for="incident_description">Incident Description:</label>
                <textarea name="incident_description" id="incident_description" required><?php echo $incident_description; ?></textarea>
                <label for="incident_location">Incident Location:</label>
                <input type="text" name="incident_location" id="incident_location" value="<?php echo $incident_location; ?>" required>
                <label for="incident_status">Incident Status:</label>
                <input type="text" name="incident_status" id="incident_status" value="<?php echo $incident_status; ?>" required>
                <input type="submit" value="Update Incident Report">
            </form>
    <?php
        } else {
            echo '<p>Incident report not found.</p>';
        }
    } else {
        echo '<p>Incident ID not provided.</p>';
    }
    ?>
</body>
</html>
