<?php
// Start the session
session_start();

// Check if the user is logged in and has a role set
if (!isset($_SESSION['user_info']['role'])) {
    // User is not logged in. Redirect them back to the login page.
    header('Location: index.php');
    exit;
}

// Check the user's role
if ($_SESSION['user_info']['role'] == 'admin') {
    // User is an admin. Do nothing, allow the page to continue loading.
} else if ($_SESSION['user_info']['role'] == 'client') {
    // User is a client. Redirect them back to the index page.
    header('Location: index.php');
    exit;
} else {
    // User has an unknown role. Redirect them to a 404 page.
    header('Location: 404.php');
    exit;
}
var_dump($_SESSION);
?>
<?php 

include("../db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Announcements</title>

    <link rel="stylesheet" type="text/css" href=""css/index.css>

    <link href="css/index.css" rel="stylesheet">
    <link href="css/positioning.css" rel="stylesheet">


</head>

<body >
    <?php include 'Admin\functions\NewsUpdate\ShowNews.php' ?>
</div>



</body>

</html>