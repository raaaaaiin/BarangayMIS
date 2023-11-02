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

    $sql = "SELECT * FROM gallery ORDER BY upload_date DESC";
    $result = $conn->query($sql);

    $gallery = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $gallery[] = $row;
        }
    }
    $uploadDir = "../../../public/image/";
  ?>
   <div class="container" style="
    border-radius: 25px;
    padding: 25px;
    background-color: white;
    box-shadow: 4px 4px 8px 2px rgba(0, 0, 0, 0.2);
">
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
        <th>Status</th>
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
          echo '<td>' . $image['active'] . '</td>';
          echo '<td class="actions">';
          echo '<a href="edit-gallery.php?id=' . htmlspecialchars($image['id']) . '" class="edit-btn">Edit</a>';
          echo '<a href="delete-gallery.php?id=' . htmlspecialchars($image['id']) . '" class="delete-btn">Archive</a>';
          echo '</td>';
          echo '</tr>';
      }
      ?>
    </tbody>
  </table>
    </div>
</body>
</html>
