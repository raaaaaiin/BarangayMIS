<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>News Feed</title>
    <style>
        /* CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
        }

        .container {
            display: flex;
            max-width: 1200px;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar {
            flex: 0 0 300px;
            background-color: #f2f2f2;
            padding: 20px;
            border-right: 1px solid #ccc;
        }

        .sidebar h3 {
            margin-top: 0;
        }

        .sorter {
            margin-bottom: 20px;
        }

        .sorter label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .sorter select {
            width: 100%;
            padding: 5px;
            border: none;
            border-radius: 4px;
            background-color: #fff;
            color: #333;
            margin-bottom: 10px;
        }

        .sorter input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .interests {
            padding: 20px;
        }

        .interests .box {
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            padding: 10px;
            font-size: 14px;
        }

        .news {
            flex: 1;
            background-color: #fff;
            padding: 20px;
        }

        .news .post {
            max-width:800px;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .news .post .header {
            display: flex;
            align-items: center;
        }

        .news .post .header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .news .post .header .author {
            font-weight: bold;
        }

        .news .post .content {
            margin-top: 10px;
        }

        .news .post .image {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .news .post .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .news .post .footer .date {
            color: #888;
        }

        .news .post .footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
    <div class="sidebar">
            <h3>Sort By</h3>
            <div class="sorter">
                <form method="GET" action="">
                    <label for="sort-option">Sort Option:</label>
                    <select id="sort-option" name="sort">
                        <option value="date">Date</option>
                        <option value="type">Type</option>
                        <option value="status">Status</option>
                    </select>
                    <input type="submit" value="Sort">
                </form>
            </div>
            <div class="interests">
                <h3>You Might Be Interested</h3>
                <?php
                // Include the database connection file
                include_once '../../../db.php';

                // Retrieve random news events from the database
                $sql = "SELECT * FROM news_events ORDER BY RAND() LIMIT 4";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="box">';
                        echo $row['title'];
                        echo '</div>';
                    }
                } else {
                    echo '<p>No news events found.</p>';
                }
                ?>
            </div>
        </div>
        <div class="news">
            <h3>Latest News</h3>
            <?php
            // Retrieve the news events data from the database
            $sortOption = isset($_GET['sort']) ? $_GET['sort'] : 'date'; // Default sort option is date
            $sql = "SELECT * FROM news_events ORDER BY $sortOption DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="post">';
                    echo '<div class="header">';
                    echo '<img src="../../../Public/image/' . $row['image'] . '" alt="Author Image">';
                    echo '<span class="author">' . $row['title'] . '</span>';
                    echo '</div>';
                    echo '<div class="content">';
                    
                    // Check if description is longer than 30 characters
                    if (strlen($row['description']) > 160) {
                        echo '<p class="short-description">' . substr($row['description'], 0, 160) . '... <a href="#" class="see-more">See More</a></p>';
                        echo '<p class="full-description" style="display:none;">' . $row['description'] . ' <a href="#" class="see-less">See Less</a></p>';
                    } else {
                        echo '<p>' . $row['description'] . '</p>';
                    }
                    
                    echo '</div>';
                    echo '<img class="image" src="../../../Public/image/' . $row['image'] . '" alt="News Image">';
                    echo '<div class="footer">';
                    echo '<span class="date">' . $row['date'] . ' ' . $row['time'] . '</span>';
                    echo '<a href="DetailsNews.php?id=' . $row['id'] . '">Read More</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No news events found.</p>';
            }
            ?>
        </div>
    </div>

    <script>
    // Add JavaScript to toggle "See More" and "See Less"
    document.querySelectorAll('.see-more').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const shortDescription = this.parentElement;
            const fullDescription = this.parentElement.nextElementSibling;
            shortDescription.style.display = 'none';
            fullDescription.style.display = 'block';
        });
    });

    document.querySelectorAll('.see-less').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const fullDescription = this.parentElement;
            const shortDescription = this.parentElement.previousElementSibling;
            shortDescription.style.display = 'block';
            fullDescription.style.display = 'none';
        });
    });
</script>
</body>
</html>
