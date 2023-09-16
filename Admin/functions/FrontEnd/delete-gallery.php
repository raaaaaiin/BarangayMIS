<?php
    include_once '../../../db.php';

    if (!isset($_GET['id'])) {
        echo "<script>alert('No gallery item specified.'); window.location.href='ShowGallery.php';</script>";
        exit;
    }

    $id = $_GET['id'];

    // Prepare SQL statement to delete a record
    $stmt = $conn->prepare("UPDATE gallery set active = 0 WHERE id = ?");

    // Bind the id to the prepare statement
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Gallery item has been deleted successfully.'); window.location.href='ShowGallery.php';</script>";
    } else {
        echo "<script>alert('Error deleting gallery item: " . $conn->error . "'); window.location.href='ShowGallery.php';</script>";
    }

    $stmt->close();
?>
