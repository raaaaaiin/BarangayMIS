<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaction Table View</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f2f2f2;
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
<body>
  <?php
    include_once '../../../db.php';
$userid = $_SESSION['id'];

    $sql = "SELECT * FROM `finance_clearance_issued` where Issue_ID = '$userid' order by id desc;";

    $result = $conn->query($sql);

    $gallery = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $gallery[] = $row;
        }
    }
    $uploadDir = "../../../public/signatures/";
    
    $pdfDir = "../../../public/certs_issued/";
  ?>
  <div class="container" style="
    border-radius: 25px;
    padding: 25px;
    background-color: white;
    box-shadow: 4px 4px 8px 2px rgba(0, 0, 0, 0.2);
">
 <h1 class="text-2xl font-bold mb-3">Transaction View</h1>
 <div class="container">
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
  <input class="nosubmit" type="search" placeholder="Search..."></div><br>
 
  <table>
    <thead>
      <tr>
        <th>Type</th>
        <th>Status</th>
        <th>Date</th>
        <th class="actions">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($gallery as $image) {
          echo '<tr>';
          echo '<td>' . $image['TYPE'] . '</td>';
          echo '<td>' . $image['status'] . '</td>';
          echo '<td>' . $image['Created_at'] . '</td>';
          echo '<td class="actions">';
          
          if( $image['status'] == "Received"){
            
          
          }elseif($image['status'] == "Approved"){
           }
          elseif($image['status'] == "Pending"){
            echo '<a class="delete-btn" href="delete-request.php?id='.$image['id'].'">Forfeit</a>';
          }
          
          echo '</td>';
          echo '</tr>';
      }
      ?>
    </tbody>
  </table>
    </div>
</body> <script>
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
</html>
