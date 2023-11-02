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
        }

        table thead {
            background-color: #007bff;
            color: #fff;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
        }

        table tbody tr:nth-child(even) {
            background-color: #fff;
        }

        table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .action-buttons {
            display: flex;
            justify-content: flex-start;
        }

        .edit-btn, .delete-btn {
            display: inline-block;
            padding: 5px;
            border: none;
            border-radius: 4px;
            margin-right: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            color: #fff;
            text-decoration: none;
        }

        .edit-btn {
            background-color: #007bff;
        }

        .delete-btn {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
<div class="container" style="
    border-radius: 25px;
    padding: 25px;
    background-color: white;
    box-shadow: 4px 4px 8px 2px rgba(0, 0, 0, 0.2);
">
    <h1>Incident Reports <a href="create-incident.php" style="display: inline-block; background-color: green; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; position: relative;">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 24px; height: 24px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
</a></h1>
    <table>
        <thead>

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
    </thead>
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
                echo '<a href="read-incident.php?id=' . $incident_id . '" class="edit-btn">Read</a>';
                echo '<a href="update-incident.php?id=' . $incident_id . '" class="edit-btn"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg></a>';
                echo '<a href="delete-incident.php?id=' . $incident_id . '" class="delete-btn"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                  </svg></a>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="11">No incident reports found.</td></tr>';
        }
        ?>
    </table>
    </div>
</body>
</html>
