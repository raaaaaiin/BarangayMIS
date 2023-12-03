<?php
include_once '../../../db.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('No Request item specified.'); window.location.href='show-request.php';</script>";
    exit;
}

$id = $_GET['id'];

// Prepare SQL statement to update the status of a record
$stmt = $conn->prepare("UPDATE finance_clearance_issued SET status = 'Received' WHERE id = ?");

// Bind the id to the prepare statement
$stmt->bind_param("i", $id);

// Execute the statement
if ($stmt->execute()) {
    echo "<script>alert('Request item has been Received successfully.'); window.location.href='show-request.php';</script>";

} else {
    echo "<script>alert('Error updating Request item: " . $stmt->error . "'); window.location.href='show-request.php';</script>";
}

$stmt->close();

$sqlisms = "INSERT INTO sms_messages (phone_number, message_content, send_date, sent_date, active_status)
	 SELECT fci.phone AS phone_number,
			'Your Certificate has been claimed. If you believe this is a mistake, please visit us.\n\nRespectfully, Sitio Igiban Services' AS message_content,
			NOW() AS send_date,
			NULL AS sent_date,
			0 AS active_status
	 FROM finance_clearance_issued fci
	 WHERE fci.id = $id;
	 ";
	 
	 mysqli_query($conn, $sqlisms);
?>
