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

    $sql = "SELECT * FROM `finance_clearance_issued`;";
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
 <h1 class="text-2xl font-bold mb-3">Transaction View</h1>
  <table>
    <thead>
      <tr>
      <th>Resident Name</th>
        <th>Signature</th>
        <th>File Name</th>
        <th>Status</th>
        <th class="actions">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($gallery as $image) {
          echo '<tr>';
         echo '<td>' . htmlspecialchars($image['Res_ID']) . '</td>';
         echo '<td><img src="' . $uploadDir . $image['SIGNATURE'] . '" width="100"></td>';
           
         echo '<td><a href="' . $pdfDir . htmlspecialchars($image['FILE']) . '">' . htmlspecialchars($image['FILE']) . '</a></td>';

          echo '<td>' . $image['status'] . '</td>';
          echo '<td class="actions">';
          //echo '<a href="edit-gallery.php?id=' . htmlspecialchars($image['id']) . '" class="edit-btn">Edit</a>';
          
          echo '<a href="../BarangayClearance/'.substr(strstr($image['LINK'], ' '), 1).'" class="edit-btn">Approve</a>';
          echo '<a class="delete-btn">Archive</a>';
          
          echo '</td>';
          echo '</tr>';
      }
      ?>
    </tbody>
  </table>
</body>
</html>
