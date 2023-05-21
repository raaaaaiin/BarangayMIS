<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>News Event Highlight</title>
    <style>
        /* CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #333;
            margin: 0;
        }

        .content {
            margin-bottom: 20px;
        }

        .content img {
            max-width: 100%;
            margin-bottom: 10px;
        }

        .content p {
            line-height: 1.5;
            margin: 0;
        }

        .footer {
            text-align: right;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Include the database connection file
        include_once '../../../db.php';

        // Retrieve the news event based on the provided ID
        $id = $_GET['id'];
        $sql = "SELECT * FROM news_events WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<div class="header">';
            echo '<h1>' . $row['title'] . '</h1>';
            echo '</div>';
            echo '<div class="content">';
            echo '<img src="../../../Public/image/' . $row['image'] . '" alt="News Image">';
            echo '<p>' . $row['description'] . '</p>';
            echo '</div>';
            echo '<div class="footer">';
            echo '<a href="EditNews.php?id=' . $row['id'] . '">Edit</a>';
            echo '</div>';
        } else {
            echo '<p>No news event found.</p>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
