<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Show Barangay Staff</title>
    <style>
        /* Additional CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background-color: #007bff;
            color: #fff;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
        }

        table tbody tr:nth-child(even) {
            background-color: #fff;
        }

        table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .action-buttons {
            display: flex;
            justify-content: flex-start;
        }

        .action-buttons a {
            display: inline-block;
            padding: 5px;
            border: none;
            border-radius: 4px;
            margin-right: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            color: #fff;
            text-decoration: none;
        }

        .action-buttons a.edit {
            background-color: #007bff;
        }

        .action-buttons a.delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
<?php
    include_once '../../../db.php';

    // Fetch data from the database
    $query = "SELECT
        barangay_staff.id as staffid,
        barangay_staff.resident_id,
        barangay_staff.position,
        barangay_staff.date_added,
        barangay_staff.date_updated,
        users.id,
        users.email,
        users.username,
        users.`password`,
        users.firstname,
        users.middlename,
        users.lastname,
        users.housenumber,
        users.street,
        users.barangay,
        users.city,
        users.state,
        users.zip,
        users.phone,
        users.dob,
        users.gender,
        users.occupation
        FROM
        barangay_staff
        INNER JOIN users ON barangay_staff.resident_id = users.id";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        ?>
        <div class="container">
        <h1 class="text-2xl font-bold mb-3">Barangay Staff <a href="create-staff.php" style="display: inline-block; background-color: green; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; position: relative;">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 24px; height: 24px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
</a></h1>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Date Added</th>
                        <th>Date Updated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $fullName = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
                    ?>
                    <tr>
                        <td><?php echo $fullName; ?></td>
                        <td><?php echo $row['position']; ?></td>
                        <td><?php echo $row['date_added']; ?></td>
                        <td><?php echo $row['date_updated']; ?></td>
                        <td class="actions">
                            <div class="action-buttons">
                                <a href="edit-staff.php?id=<?php echo $row['staffid']; ?>" class="edit">Edit</a>
                                <a href="delete-staff.php?id=<?php echo $row['staffid']; ?>" class="delete">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php
    } else {
        echo "No records found.";
    }

    mysqli_close($conn);
?>
</body>
</html>
