<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern Web Page</title>
  <link rel="stylesheet" href="css/news.css">
</head>
<body  style="background-color:#f9f9f9 !important">
  <div class="hero">
    <img src="../public/image/wall.jpg" alt="Background image">
    <div class="hero-text">
      <h1>Sitio Igiban </h1>
      <h2>News and Updates!</h2>
    </div>
  </div>
 
  <div class="categories">
   <?php
include('../db.php'); // Include your database connection file
$sortOption = isset($_GET['sort']) ? $_GET['sort'] : 'date'; // Default sort option is date
$sql = "SELECT * FROM news_events ORDER BY $sortOption DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="category-card">';
        echo '<img src="../../../Public/image/' . $row['image'] . '" alt="Category image">';
        echo '<h5>' . $row['title'] . '</h5>';
        
        // Check if description is longer than 160 characters
        if (strlen($row['description']) > 160) {
            echo '<p>' . substr($row['description'], 0, 160) . '...</p>';
        } else {
            echo '<p>' . $row['description'] . '</p>';
        }

        echo '</div>';
    }
} else {
    echo '<p>No news events found.</p>';
}
?>
    <!-- Repeat category-card div for multiple cards -->
  </div>
</body>
</html>
