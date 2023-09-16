<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Show Incident Reports</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        td:last-child {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <h1>Incident Reports <a href="create-incident.php" style="display: inline-block; background-color: green; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; position: relative;">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 24px; height: 24px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
</a></h1>
    <table>
        <tr>
            <th>Incident ID</th>
            <th>Resident ID</th>
            <th>Date Reported</th>
            <th>Time Reported</th>
            <th>Incident Type</th>
            <th>Incident Description</th>
            <th>Incident Location</th>
            <th>Incident Status</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php
        // Include the database connection file
        include_once '../../../db.php';

        // Retrieve all incident reports from the database
        $sql = "SELECT * FROM resident_incident_report";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $incident_id = $row['id'];
                $resident_id = $row['resident_id'];
                $date_reported = $row['date_reported'];
                $time_reported = $row['time_reported'];
                $incident_type = $row['incident_type'];
                $incident_description = $row['incident_description'];
                $incident_location = $row['incident_location'];
                $incident_status = $row['incident_status'];
                $date_created = $row['date_created'];
                $date_updated = $row['date_updated'];

                echo '<tr>';
                echo '<td>' . $incident_id . '</td>';
                echo '<td>' . $resident_id . '</td>';
                echo '<td>' . $date_reported . '</td>';
                echo '<td>' . $time_reported . '</td>';
                echo '<td>' . $incident_type . '</td>';
                echo '<td>' . $incident_description . '</td>';
                echo '<td>' . $incident_location . '</td>';
                echo '<td>' . $incident_status . '</td>';
                echo '<td>' . $date_created . '</td>';
                echo '<td>' . $date_updated . '</td>';
                
                echo '<td>' . $row['active'] . '</td>';
                echo '<td>';
                echo '<a href="read-incident.php?id=' . $incident_id . '">Read</a>';
                echo '<a href="update-incident.php?id=' . $incident_id . '">Edit</a>';
                echo '<a href="delete-incident.php?id=' . $incident_id . '">Archive</a>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="11">No incident reports found.</td></tr>';
        }
        ?>
    </table>
</body>
</html>
