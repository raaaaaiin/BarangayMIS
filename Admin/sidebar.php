<?php
session_start();
require_once('../db.php');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMIS</title>
    <style>
        :root {
            --primary-color: #1877f2;
            --background-color: #f0f2f5;
            --text-color: #1d2129;
            --hover-color: #e4e6eb;
            --transition-speed: 0.3s;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: var(--background-color);
            color: var(--text-color);
        }
        .header {
            background-color: var(--primary-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            height: 60px;
            font-size: 26px;
            color: white;
        }
        .sidebar {
            width: 99%;
            
            background-color: #ffffff;
            position: fixed;
            top: 60px;
            left: 0;
            height: 100%;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
            transition: transform var(--transition-speed);
        }
        .main {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left var(--transition-speed);
        }
        .profile {
            display: flex;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #dddfe2;
            color: var(--text-color);
        }
        .profile img {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }
        .profile-name {
            font-weight: bold;
            font-size: 18px;
        }
        .profile-position {
            font-size: 14px;
        }
        a {
            display: block;
            text-decoration: none;
            padding: 15px 20px;
            font-size: 18px;
            color: var(--text-color);
            font-weight: bold;
            transition: background-color var(--transition-speed), color var(--transition-speed);
            border-left: 3px solid transparent;
        }
        a:hover, a.active {
            background-color: #e4e6eb;
            border-left: 3px solid var(--primary-color);
        }
        .logout-link {
            position: absolute;
            bottom: 10px;
            width: 100%;
        }
        .logout-link:hover {
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <div class="header">
    BMIS
    </div>
    <div class="sidebar">
        <div class="profile">
        <img src="https://via.placeholder.com/75" alt="Profile Picture">

            <div>
                <div class="profile-name">Name</div>
                <div class="profile-position">Position</div>
            </div>
        </div>
        <?php
        
            echo '
        <a href="Communication/index.php" target="FraDisplay">Communication</a>
        <a href="Resident/index.php" target="FraDisplay">Residents</a>
		<a href="Blotter/index.php" target="FraDisplay">Blotter</a>
		<a href="Certificate/index.php" target="FraDisplay">Certificates</a>
		<a href="Profile/index.php" target="FraDisplay">Profile</a>
		';
		
		?>
		<a href="Logout.php" class="logout-link">Logout</a>
		
		</div>
		</body>
		</html>