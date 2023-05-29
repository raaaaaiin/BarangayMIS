<?php
// Start the session
session_start();

// Check if the user is logged in and has a role set
if (!isset($_SESSION['role'])) {
    // User is not logged in. Redirect them back to the login page.
    header('Location: index.php');
}

// Check the user's role
if ($_SESSION['role'] == 'admin') {
    // User is an admin. Do nothing, allow the page to continue loading.
} else if ($_SESSION['role'] == 'client') {
    // User is a client. Redirect them back to the index page.
    header('Location: index.php');
} else {
    // User has an unknown role. Redirect them to a 404 page.
    header('Location: index.php');
}
?>
<?php

include('../db.php');
?>

<html>
<title>Admin Panel</title>

<style> .info {
        color: rgba(29, 33, 36, 0.76);
        border-left: 6px solid #2196F3;
    }
body {
	background-color: white;
}
</style>
<head>
    
<frameset cols="15%,85%" frameborder="0">
<!-- <frame src="header.php" noresize="noresize"> -->

<frame src="sidebar.php" name="FraLink">

<frameset rows="65px,100%">

<frame src="nav.php" name="FraNav">
<frame src="functions/NewsUpdate/ShowNews.php" name="FraDisplay">
</frameset>

</frameset>
</head></html>