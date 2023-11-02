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
<body style="font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f2f2f2;">
<div style="
    border-radius: 25px;
    padding: 25px;
    background-color: white;
    box-shadow: 4px 4px 8px 2px rgba(0, 0, 0, 0.2);
">
<h1>Resident Information</h1><table>
  <thead>
    <tr>
      <th>Fullname</th>
      <th>Address</th>
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
          echo "<td>" . $row["firstname"] ." " .  $row["middlename"] ." " . $row["lastname"] . "</td>";
          echo "<td>" . $row["housenumber"] ." " .  $row["street"] ." " . $row["barangay"] ." " .  $row["city"] ." " . $row["state"] ." " . $row["zip"] . "</td>";
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
    </div>
    </body>
    </head>