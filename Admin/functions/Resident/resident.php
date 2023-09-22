<html>
    <head>
        <style>
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

        .edit-btn, .delete-btn {
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

        .edit-btn {
            background-color: #007bff;
        }

        .delete-btn {
            background-color: #dc3545;
        }
            </style>
</head>
<body><table>
  <caption>Resident Information</caption>
  <thead>
    <tr>
      <th>ID</th>
      <th>Email</th>
      <th>Username</th>
      <th>Password</th>
      <th>First Name</th>
      <th>Middle Name</th>
      <th>Last Name</th>
      <th>House Number</th>
      <th>Street</th>
      <th>Barangay</th>
      <th>City/Municipality</th>
      <th>Province</th>
      <th>Zip Code</th>
      <th>Phone Number</th>
      <th>Date of Birth</th>
      <th>Gender</th>
      <th>Occupation</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include '../../../db.php';

      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row["id"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "<td>" . $row["username"] . "</td>";
          echo "<td>" . $row["password"] . "</td>";
          echo "<td>" . $row["firstname"] . "</td>";
          echo "<td>" . $row["middlename"] . "</td>";
          echo "<td>" . $row["lastname"] . "</td>";
          echo "<td>" . $row["housenumber"] . "</td>";
          echo "<td>" . $row["street"] . "</td>";
          echo "<td>" . $row["barangay"] . "</td>";
          echo "<td>" . $row["city"] . "</td>";
          echo "<td>" . $row["state"] . "</td>";
          echo "<td>" . $row["zip"] . "</td>";
          echo "<td>" . $row["phone"] . "</td>";
          echo "<td>" . $row["dob"] . "</td>";
          echo "<td>" . $row["gender"] . "</td>";
          echo "<td>" . $row["occupation"] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='17'>No results found</td></tr>";
      }

      mysqli_close($conn);
    ?>
  </tbody>
</table>
    </body>
    </head>