<?php
include_once '../../../db.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('No Request item specified.'); window.location.href='index_view.php';</script>";
    exit;
}

$id = $_GET['id'];

// Prepare SQL statement to update the status of a record
$stmt = $conn->prepare("DELETE from users where id = ?");

// Bind the id to the prepare statement
$stmt->bind_param("i", $id);

// Execute the statement
if ($stmt->execute()) {
    echo "<script>alert('User has been Deleted successfully.'); window.location.href='resident.php';</script>";

} else {
    echo "<script>alert('Error Deleting user: " . $stmt->error . "'); window.location.href='resident.php';</script>";
}

$stmt->close();
?>
