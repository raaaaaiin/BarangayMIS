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
        $sql = "DELETE FROM news_events WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Event deleted successfully.");</script>';
        } else {
            echo '<script>alert("Error deleting the event.");</script>';
        }
    }
    ?>

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
                    echo '<a href="EditNews.php?id=' . $row['id'] . '" class="edit-btn">Edit</a>';
                    echo '<button class="delete-btn" onclick="showConfirmationDialog(' . $row['id'] . ', \'' . $row['title'] . '\', \'' . $row['description'] . '\')">Delete</button>';
                    
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
            <p><strong>ID:</strong> <span id="event-id"></span></p>
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
        var eventId = document.getElementById('event-id');
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
