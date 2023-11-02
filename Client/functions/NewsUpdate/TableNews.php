<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>News Events</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table thead {
            background-color: #0066cc;
            color: #fff;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
        }

        table th {
            font-weight: bold;
        }

        table tbody tr {
            border-bottom: 1px solid #ddd;
        }

        table tbody tr:last-child {
            border-bottom: none;
        }

        .edit-btn, .delete-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #0066cc;
            color: #fff;
        }

        .delete-btn {
            background-color: #cc0000;
            color: #fff;
        }

        .confirmation-dialog {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        .dialog-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            max-width: 400px;
            text-align: center;
        }

        .dialog-box h3 {
            margin-top: 0;
        }

        .dialog-box p {
            margin-bottom: 20px;
        }

        .dialog-box .btn-wrapper {
            text-align: center;
        }

        .dialog-box .btn-wrapper button {
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <?php
    // Include the database connection file
    include_once '../../../db.php';

    // Delete the event if the confirmation is received
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete-confirm'])) {
       
        $id = $_POST['event-id'];
       $sql = "UPDATE news_events SET active = 0 WHERE id = $id";
       
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Event deleted successfully.");</script>';
        } else {
            echo '<script>alert("Error deleting the event.");</script>';
        }
    }
    ?>
<h1>News and Update <a href="AddNews.php" style="display: inline-block; background-color: green; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; position: relative;">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 24px; height: 24px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
</a></h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Type</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Contact Person</th>
                <th>Organizer</th>
                <th>Location</th>
                <th>Date Created</th>
                <th>Date Updated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Retrieve the news events data from the database
            $sql = "SELECT * FROM news_events";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['title'] . '</td>';
                    echo '<td>' . $row['description'] . '</td>';
                    echo '<td>' . $row['image'] . '</td>';
                    echo '<td>' . $row['type'] . '</td>';
                    echo '<td>' . $row['date'] . '</td>';
                    echo '<td>' . $row['time'] . '</td>';
                    echo '<td>' . $row['status'] . '</td>';
                    echo '<td>' . $row['contact_person'] . '</td>';
                    echo '<td>' . $row['organizer'] . '</td>';
                    echo '<td>' . $row['location'] . '</td>';
                    echo '<td>' . $row['date_created'] . '</td>';
                    echo '<td>' . $row['date_updated'] . '</td>';
                    echo '<td>';
                    echo '<a href="EditNews.php?id=' . $row['id'] . '" class="edit-btn"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg></a>';
                    echo '<button class="delete-btn" onclick="showConfirmationDialog(' . $row['id'] . ', \'' . $row['title'] . '\', \'' . $row['description'] . '\')"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                  </svg></button>';
                    
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="14">No events found.</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <div class="confirmation-dialog" id="confirmation-dialog">
        <div class="dialog-box">
            <h3>Confirm Delete</h3>
            <p>Are you sure you want to delete this event?</p>
            <p><strong>ID:</strong> <span id="event-ide"></span></p>
            <p><strong>Title:</strong> <span id="event-title"></span></p>
            <p><strong>Description:</strong> <span id="event-description"></span></p>
            <div class="btn-wrapper">
                <button onclick="deleteEvent()">Yes</button>
                <button onclick="hideConfirmationDialog()">No</button>
            </div>
        </div>
    </div>

    <script>
        var confirmationDialog = document.getElementById('confirmation-dialog');
        var eventId = document.getElementById('event-ide');
        var eventTitle = document.getElementById('event-title');
        var eventDescription = document.getElementById('event-description');

        function showConfirmationDialog(id, title, description) {
            eventId.textContent = id;
            eventTitle.textContent = title;
            eventDescription.textContent = description;
            confirmationDialog.style.display = 'flex';
        }

        function hideConfirmationDialog() {
            confirmationDialog.style.display = 'none';
        }

        function deleteEvent() {
            document.getElementById('event-id').value = eventId.textContent;
            document.getElementById('delete-form').submit();
           
        }
    </script>

    <form id="delete-form" method="POST" action="">
        <input type="hidden" name="event-id" id="event-id" value="">
        <input type="hidden" name="delete-confirm" value="1">
    </form>
</body>
</html>
