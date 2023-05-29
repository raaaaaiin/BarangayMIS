<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Event</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }

        .card {
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .card h1 {
            color: #333;
        }

        .form-row {
            display: flex;
            margin-bottom: 20px;
        }

        .form-row label {
            width: 100px;
            padding-right: 10px;
            line-height: 30px;
        }

        .form-row input[type="text"],
        .form-row input[type="date"],
        .form-row input[type="time"],
        .form-row textarea {
            flex: 1;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
        }

        .form-row input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-row input[type="submit"]:hover {
            background-color: #45a049;
        }

        .form-column {
            width: 50%;
            padding: 0 10px;
        }

        .form-column:first-child {
            padding-right: 5px;
        }

        .form-column:last-child {
            padding-left: 5px;
        }

        .success-message {
            color: green;
            margin-top: 10px;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Create Event</h1>

        <?php
        // Include the database connection file
        include_once '../../../db.php';

        // Define variables to store user input
        $title = $description = $image = $type = $date = $time = $status = $contact_person = $organizer = $location = '';

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the form data
            $title = $_POST['title'];
            $description = $_POST['description'];
            $type = $_POST['type'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $status = $_POST['status'];
            $contact_person = $_POST['contact_person'];
            $organizer = $_POST['organizer'];
            $location = $_POST['location'];

            // Handle file upload
            $image = $_FILES['image']['name'];
            $image_temp = $_FILES['image']['tmp_name'];
            $image_extension = pathinfo($image, PATHINFO_EXTENSION);
            $new_image_name = 'News_' . date("YmdHis") . '.' . $image_extension;
            $image_path = '../../../Public/image/' . $new_image_name;

            if (move_uploaded_file($image_temp, $image_path)) {
                // Prepare the SQL statement to insert the data
                $sql = "INSERT INTO news_events (title, description, image, type, date, time, status, contact_person, organizer, location, date_created, date_updated)
                        VALUES ('$title', '$description', '$new_image_name', '$type', '$date', '$time', '$status', '$contact_person', '$organizer', '$location', NOW(), NOW())";

                // Execute the SQL statement
                if ($conn->query($sql) === TRUE) {
                    echo '<p class="success-message">Event created successfully!</p>';
                } else {
                    echo '<p class="error-message">Error: ' . $sql . '<br>' . $conn->error . '</p>';
                }
            } else {
                echo '<p class="error-message">Error uploading the image.</p>';
            }
        }
        ?>

        <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-row">
                <div class="form-column" style="width:100%">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" required>
                </div>
                
            </div>
            <div class="form-row">
                
                <div class="form-column" style="width:100%">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" required></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-column">
                    <label for="image">Image:</label><br>
                    <input type="file" name="image" id="image" required>
                </div>
                <div class="form-column">
                    <label for="type">Type:</label>
                    <input type="text" name="type" id="type" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-column">
                    <label for="date">Date:</label>
                    <input type="date" name="date" id="date" required>
                </div>
                <div class="form-column">
                    <label for="time">Time:</label>
                    <input type="time" name="time" id="time" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-column">
                    <label for="status">Status:</label>
                    <input type="text" name="status" id="status" required>
                </div>
                <div class="form-column">
                    <label for="contact_person">Contact Person:</label>
                    <input type="text" name="contact_person" id="contact_person" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-column">
                    <label for="organizer">Organizer:</label>
                    <input type="text" name="organizer" id="organizer" required>
                </div>
                <div class="form-column">
                    <label for="location">Location:</label>
                    <input type="text" name="location" id="location" required>
                </div>
            </div>

            <div class="form-row">
                <input type="submit" value="Create Event">
            </div>
        </form>
    </div>
</body>
</html>
Z