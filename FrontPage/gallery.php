<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Basic Gallery</title>
  <link rel="stylesheet" href="css/gallery.css">
</head>
<body  style="background-color:#f9f9f9 !important">
  <div class="gallery">
    <?php
    include '../db.php';

    // Make a SQL query to the database
    $sql = "SELECT image_url FROM gallery";
    $result = $conn->query($sql);

    // If the query was successful
    if ($result->num_rows > 0) {
        // Output data for each row
        while($row = $result->fetch_assoc()) {
            echo '<div class="card">';
            echo '<img src="../public/image/' . $row["image_url"] . '" alt="Image">';
            echo '</div>';
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
  </div>
  <div id="modal" class="modal">
    <span id="close">&times;</span>
    <img id="modal-image" src="" alt="Selected image">
  </div>
  <script src="js/gallery.js"></script>
</body>
</html>
