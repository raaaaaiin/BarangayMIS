<?php
    include_once '../../../db.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        // Delete the staff record from the database
        $query = "DELETE FROM barangay_staff WHERE id='$id'";
        mysqli_query($conn, $query);
        mysqli_close($conn);

        // Redirect to the show-staff.php page
        header('Location: show-staff.php');
        exit();
    } else {
        echo "Invalid request.";
        exit();
    }
?>
