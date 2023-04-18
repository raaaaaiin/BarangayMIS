<html>
    <head>
        <style>
            table {
  border-collapse: collapse;
  width: 100%;
  margin: 20px 0;
}

caption {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 10px;
  text-align: center;
}

thead {
  background-color: #f2f2f2;
  text-align: left;
}

th {
  padding: 12px;
  text-align: left;
  font-weight: bold;
  color: #555555;
  border-bottom: 2px solid #ddd;
}

tbody tr:nth-child(even) {
  background-color: #f9f9f9;
}

td {
  padding: 12px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

/* hover effect */
tbody tr:hover {
  background-color: #ddd;
}

/* responsive design */
@media only screen and (max-width: 600px) {
  table {
    font-size: 14px;
  }
  th, td {
    padding: 8px;
  }
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
    include '../../db.php';

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