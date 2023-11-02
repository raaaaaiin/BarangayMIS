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
        barangay_staff.active,
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
        <div class="container" style="
    border-radius: 25px;
    padding: 25px;
    background-color: white;
    box-shadow: 4px 4px 8px 2px rgba(0, 0, 0, 0.2);
">
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
                        <th>Status</th>
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
                        <th><?php echo $row['active']; ?></th>
                        <td class="actions">
                            <div class="action-buttons">
                                <a href="edit-staff.php?id=<?php echo $row['staffid']; ?>" class="edit"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg></a>
                                <a href="delete-staff.php?id=<?php echo $row['staffid']; ?>" class="delete"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                  </svg></a>
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
