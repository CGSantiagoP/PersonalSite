<?php
session_start();
if (!isset($_SESSION['owner_logged_in']) || $_SESSION['owner_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);


// Connect to database
$conn = new mysqli("sql213.infinityfree.com", "if0_38389790", "6AJvtAGwU7Qn", "if0_38389790_gallery_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $upload_dir = "uploads/";  // Folder to store images
    $file_name = basename($_FILES["image"]["name"]);
    $target_file = $upload_dir . $file_name;
    $description = htmlspecialchars($_POST["description"]);
    $upload_ok = 1;
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    // Check for file upload errors
    if ($_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
        echo "Error uploading file: " . $_FILES["image"]["error"];
        exit();
    }



    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $upload_ok = 0;
    }
    $allowed_types = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($image_file_type, $allowed_types)) {
        echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
        $upload_ok = 0;
    }
// Can change the size accepted here
    if ($_FILES["image"]["size"] > 5 * 1024 * 1024) {
        echo "File is too large.";
        $upload_ok = 0;
    }

    if ($upload_ok == 1) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Insert into database
            $stmt = $conn->prepare("INSERT INTO images (file_path, description) VALUES (?, ?)");
            $stmt->bind_param("ss", $target_file, $description);
            if ($stmt->execute()) {
                echo "Image uploaded successfully!";
            } else {
                echo "Error saving image to database." . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error uploading file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- <header>
        <a href="index.php">
            <img src="components/WhiteCameraLogo.png" alt="Carlos Photography Logo" class="logoImage">
        </a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.html">About Me</a></li>
                <li><a href="gallery.php">Gallery</a></li>
            </ul>
        </nav>
        <a href="contact.html">
            <button class="contact-button">Contact</button>
        </a>
    </header> -->
    <?php include 'components/header.html'; ?>


    <main>
        <div class="upload-container">
            <h2 class="dashText">Upload a New Image</h2>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <label for="image" class="dashText">Choose an Image:</label>
                <input type="file" name="image" id="image" required>
            
                <label for="description" class="dashText">Description:</label>
                <input type="text" name="description" id="description" required>
                
                <button type="submit" class="contact-button">Upload</button>    
            </form>
            
        </div>
    </main>

    <footer>
        <div class="footer-container">
            <p>&copy; 2025 Carlos's Gallery. All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Me</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contact.html">Contact</a></li>
                <?php if (!isset($_SESSION['owner_logged_in']) || $_SESSION['owner_logged_in'] == true):?>
                    <a href="login.php">Log In</a>
                <?php endif; ?>
            </ul>
        </div>
    </footer>

</body>
</html>
