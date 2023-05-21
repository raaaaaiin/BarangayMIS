<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Incident Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-row {
            margin-bottom: 20px;
        }

        .form-row label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-row input[type="text"],
        .form-row input[type="date"],
        .form-row input[type="time"],
        .form-row textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-row textarea {
            resize: vertical;
        }

        .form-row input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .form-row input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Incident Report</h1>
        <form method="POST" action="create-incident.php">
            <div class="form-row">
                <label for="resident_id">Resident ID:</label>
                <input type="text" name="resident_id" id="resident_id" required>
            </div>

            <div class="form-row">
                <label for="date_reported">Date Reported:</label>
                <input type="date" name="date_reported" id="date_reported" required>
            </div>

            <div class="form-row">
                <label for="time_reported">Time Reported:</label>
                <input type="time" name="time_reported" id="time_reported" required>
            </div>

            <div class="form-row">
                <label for="incident_type">Incident Type:</label>
                <input type="text" name="incident_type" id="incident_type" required>
            </div>

            <div class="form-row">
                <label for="incident_description">Incident Description:</label>
                <textarea name="incident_description" id="incident_description" required></textarea>
            </div>

            <div class="form-row">
                <label for="incident_location">Incident Location:</label>
                <input type="text" name="incident_location" id="incident_location" required>
            </div>

            <div class="form-row">
                <label for="incident_status">Incident Status:</label>
                <input type="text" name="incident_status" id="incident_status" required>
            </div>

            <div class="form-row">
                <input type="submit" value="Create">
            </div>
        </form>
    </div>
</body>
</html>
