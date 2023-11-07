<?php
include_once '../../../db.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('No Request item specified.'); window.location.href='index_view.php';</script>";
    exit;
}

$id = $_GET['id'];

// Prepare SQL statement to update the status of a record
$stmt = $conn->prepare("UPDATE finance_clearance_issued SET status = 'Forfeited' WHERE id = ?");

// Bind the id to the prepare statement
$stmt->bind_param("i", $id);

// Execute the statement
if ($stmt->execute()) {
    echo "<script>alert('Request item has been Archived successfully.'); window.location.href='index_view.php';</script>";

} else {
    echo "<script>alert('Error updating Request item: " . $stmt->error . "'); window.location.href='index_view.php';</script>";
}

$stmt->close();
?>