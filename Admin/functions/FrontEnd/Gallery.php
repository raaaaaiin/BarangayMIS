
<?php
include_once '../../../db.php';

// Define upload directory
$uploadDir = '../../../public/image/';

// Initialize upload error variable
$uploadError = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was selected
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
        $caption = $_POST['caption'];
        
        // Generate unique file name
        $dateStamp = date("YmdHis");
        $fileName = 'Gallery_' . $dateStamp . '.jpg';
        $filePath = $uploadDir . $fileName;

        // Upload the file
        if (move_uploaded_file($_FILES['picture']['tmp_name'], $filePath)) {
            // File uploaded successfully, save data to the database
            $sql = "INSERT INTO gallery (image_url, caption, upload_date) VALUES (?, ?, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $fileName, $caption);
            $stmt->execute();
            $stmt->close();
        } else {
            // Error occurred while uploading the file
            $uploadError = 'Error uploading the picture. Please try again.';
        }
    } else {
        // No file selected or error occurred
        $uploadError = 'Please select a picture to upload.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Picture</title>
    <style>
        /* Add your custom CSS styles here */
        :root {
            --primary-color: #007bff;
            --accent-color: #4caf50;
            --gray-color: #f2f2f2;
            --red-color: #ff0000;
            --font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: var(--gray-color);
            font-family: var(--font-family);
        }

        .container {
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
            background-color: var(--primary-color);
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .error-message {
            color: var(--red-color);
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center text-2xl font-bold mb-6">Upload Picture</h1>
        <?php if (!empty($uploadError)) : ?>
            <p class="error-message"><?php echo $uploadError; ?></p>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="picture" class="block mb-1">Picture:</label>
                <input type="file" id="picture" name="picture" required accept="image/*">
            </div>
            <div class="form-group">
                <label for="caption" class="block mb-1">Caption:</label>
                <textarea id="caption" name="caption" rows="4" placeholder="Enter caption..." required></textarea>
            </div>
            <button type="submit" class="btn-submit">Upload</button>
        </form>
    </div>
</body>

</html>
