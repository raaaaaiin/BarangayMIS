<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Gallery Item</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f2f2f2;
    }

    .container {
      max-width: 400px;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      margin: 0 auto;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: bold;
    }

    .form-group input[type="file"],
    .form-group textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    .btn-submit {
      background-color: #0066cc;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

  </style>
</head>
<body>
  <?php
    include_once '../../../db.php';

    // Define upload directory
    $uploadDir = '../../../Public/image/';

    $id = $_GET['id'];
    $sql = "SELECT * FROM gallery WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 0) {
      echo "<script>alert('No such gallery item found.'); window.location.href='Gallery.php';</script>";
      exit;
    }

    $image = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $caption = $_POST['caption'];
      
      if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
        $dateStamp = date("YmdHis");
        $fileName = 'Gallery_' . $dateStamp . '.jpg';
        $filePath = $uploadDir . $fileName;

        // Upload the file
        if (move_uploaded_file($_FILES['picture']['tmp_name'], $filePath)) {
          $sql = "UPDATE gallery SET caption=?, image_url=? WHERE id=?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("ssi", $caption, $fileName, $id);
        } else {
          echo "<script>alert('Error uploading the picture. Please try again.'); window.location.href='edit-gallery.php?id={$id}';</script>";
        }
      } else {
        $sql = "UPDATE gallery SET caption=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $caption, $id);
      }

      if($stmt->execute()) {
        echo "<script>alert('Gallery item updated successfully.'); window.location.href='ShowGallery.php';</script>";
      } else {
        echo "<script>alert('Error updating gallery item: " . $conn->error . "'); window.location.href='ShowGallery.php';</script>";
      }
    }
  ?>

  <div class="container">
    <h1>Edit Gallery Item</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="caption">Caption:</label>
        <textarea id="caption" name="caption" required><?php echo htmlspecialchars($image['caption']); ?></textarea>
      </div>
      <div class="form-group">
        <label for="picture">Picture:</label>
        <input type="file" id="picture" name="picture" accept=".jpg">
      </div>
      <input type="submit" value="Update" class="btn-submit">
    </form>
  </div>
</body>
</html>
