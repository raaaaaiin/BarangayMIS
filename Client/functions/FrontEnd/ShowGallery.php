<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery Table View</title>
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
      margin-bottom: 20px;
    }

    table thead {
      background-color: #0066cc;
      color: #fff;
    }

    table th,
    table td {
      padding: 10px;
      text-align: left;
    }

    table th {
      font-weight: bold;
    }

    table tbody tr {
      border-bottom: 1px solid #ddd;
    }

    table tbody tr:last-child {
      border-bottom: none;
    }

    .edit-btn,
    .delete-btn {
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .edit-btn {
      background-color: #0066cc;
      color: #fff;
    }

    .delete-btn {
      background-color: #cc0000;
      color: #fff;
    }
  </style>
</head>
<body>
  <?php
    include_once '../../../db.php';

    $sql = "SELECT * FROM gallery ORDER BY upload_date DESC  where active = 1";
    $result = $conn->query($sql);

    $gallery = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $gallery[] = $row;
        }
    }
    $uploadDir = "../../../public/image/";
  ?>
 <h1 class="text-2xl font-bold mb-3">Gallery View <a href="Gallery.php" style="display: inline-block; background-color: green; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; position: relative;">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 24px; height: 24px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
</a></h1>
  <table>
    <thead>
      <tr>
        <th>Image</th>
        <th>Caption</th>
        <th>Date Uploaded</th>
        <th class="actions">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($gallery as $image) {
          echo '<tr>';
          echo '<td><img src="' . $uploadDir . $image['image_url'] . '" width="100"></td>';
          echo '<td>' . htmlspecialchars($image['caption']) . '</td>';
          echo '<td>' . htmlspecialchars($image['upload_date']) . '</td>';
          echo '<td class="actions">';
          echo '<a href="edit-gallery.php?id=' . htmlspecialchars($image['id']) . '" class="edit-btn"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg></a>';
          echo '<a href="delete-gallery.php?id=' . htmlspecialchars($image['id']) . '" class="delete-btn">Delete</a>';
          echo '</td>';
          echo '</tr>';
      }
      ?>
    </tbody>
  </table>
</body>
</html>
