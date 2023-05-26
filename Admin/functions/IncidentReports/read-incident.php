<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Incident Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            border-radius: 4px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #f3f3f3;
            padding: 10px;
            border-bottom: 1px solid #eaeaea;
            margin-bottom: 10px;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
        }

        .card-content {
            margin-bottom: 10px;
        }

        .card-content p {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Include the database connection file
        include_once '../../../db.php';

        // Check if the incident ID is provided
        if (isset($_GET['id'])) {
            // Retrieve the incident ID
            $incident_id = $_GET['id'];

            // Prepare the SQL statement to fetch the incident report
            $sql = "SELECT * FROM resident_incident_report WHERE id = '$incident_id'";
            $result = $conn->query($sql);

            // Check if the incident report exists
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Incident Report Details</h2>
                    </div>
                    <div class="card-content">
                        <p><strong>Resident ID:</strong> <?php echo $row['resident_id']; ?></p>
                        <p><strong>Date Reported:</strong> <?php echo $row['date_reported']; ?></p>
                        <p><strong>Time Reported:</strong> <?php echo $row['time_reported']; ?></p>
                        <p><strong>Incident Type:</strong> <?php echo $row['incident_type']; ?></p>
                        <p><strong>Incident Description:</strong> <?php echo $row['incident_description']; ?></p>
                        <p><strong>Incident Location:</strong> <?php echo $row['incident_location']; ?></p>
                        <p><strong>Incident Status:</strong> <?php echo $row['incident_status']; ?></p>
                        <p><strong>Date Created:</strong> <?php echo $row['date_created']; ?></p>
                        <p><strong>Date Updated:</strong> <?php echo $row['date_updated']; ?></p>
                    </div>
                </div>
        <?php
            } else {
                echo '<p>Incident report not found.</p>';
            }
        } else {
            echo '<p>Incident ID not provided.</p>';
        }
        ?>
    </div>
</body>
</html>
