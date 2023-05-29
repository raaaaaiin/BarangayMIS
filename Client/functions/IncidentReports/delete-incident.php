<?php
// Include the database connection file
include_once '../../../db.php';

// Check if the incident ID is providedc vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
if (isset($_GET['id'])) {
    // Retrieve the incident ID
    $incident_id = $_GET['id'];

    // Prepare the SQL statement to delete the incident report
    $sql = "DELETE FROM resident_incident_report WHERE id = '$incident_id'";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        // Redirect to the incident list page
        header("Location: show-incident.php");
        exit();
    } else {
        echo '<p>Error deleting incident report: ' . $conn->error . '</p>';
    }
} else {
    echo '<p>Incident ID not provided.</p>';
}
?>
\c vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv