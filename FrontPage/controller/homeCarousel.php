<?php
// Include your database connection file (e.g., db.php)
include('../../db.php');

// Query to get image URLs from the gallery table
$sql = "SELECT image_url FROM gallery where active = 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $image_urls = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $image_urls[] = $row['image_url'];
    }
    echo json_encode($image_urls);
} else {
    echo json_encode([]);
}

// Close the database connection
mysqli_close($conn);
?>