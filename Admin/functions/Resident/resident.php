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
<h1>Resident Information</h1> <div class="container">
  <style>
   
input[type=search] {
  border: none;
  background: transparent;
  margin: 0;
  padding: 7px 8px;
  font-size: 14px;
  color: inherit;
  border: 1px solid transparent;
  border-radius: inherit;
}

input[type=search]::placeholder {
  color: #bbb;
}


input.nosubmit {
  border: 1px solid #555;
  width: 100%;
  padding: 9px 4px 9px 40px;
  background: transparent url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' class='bi bi-search' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'%3E%3C/path%3E%3C/svg%3E") no-repeat 13px center;
}
    </style>
  <input class="nosubmit" type="search" placeholder="Search...">

</div>
<br>
<table>
  <thead>
    <tr>
      <th>Fullname</th>
      <th>Address</th>
      <th>Date of Birth</th>
      <th>Gender</th>
      <th>Occupation</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
include '../../../db.php';

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["firstname"] . " " . $row["middlename"] . " " . $row["lastname"] . "</td>";
        echo "<td>" . $row["housenumber"] . " " . $row["street"] . " " . $row["barangay"] . " " . $row["city"] . " " . $row["state"] . " " . $row["zip"] . "</td>";
        echo "<td>" . $row["dob"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["occupation"] . "</td>";
        echo "<td class='action-buttons'>";
        // Edit Button
        echo "<div style='display:flex'>
                  <a style='padding-bottom: 20px; padding-top: 20px;' href='EditResident.php?id=" . $row['id'] . "' class='edit-btn'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                  <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'></path>
                  <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'></path>
                </svg>
                  </a>";
        // Delete Button
        echo "
        <a style='padding-bottom: 20px; padding-top: 20px;' href='DeleteResident.php?id=" . $row['id'] . "' class='delete-btn'>
        <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'></path>
        <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'></path>
      </svg>
              </a></div>";
        echo "</td>";
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
    <script>
  document.addEventListener('DOMContentLoaded', function () {
    // Get the search input element and the table
    const searchInput = document.querySelector('.nosubmit');
    const table = document.querySelector('table');

    searchInput.addEventListener('input', function () {
      const searchText = searchInput.value.toLowerCase();
      const rows = table.querySelectorAll('tbody tr');

      rows.forEach((row) => {
        const cells = row.querySelectorAll('td');
        let match = false;

        cells.forEach((cell) => {
          const cellText = cell.textContent.toLowerCase();

          if (cellText.includes(searchText)) {
            match = true;
          }
        });

        if (match) {
          row.style.display = 'table-row';
        } else {
          row.style.display = 'none';
        }
      });
    });
  });
</script>

    </head>