<?php
session_start();
if (!isset($_SESSION['owner_logged_in']) || $_SESSION['owner_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Connect to database
$conn = new mysqli("localhost", "root", "fyddiv-rEvkow-bazso6", "gallery_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch images
$sql = "SELECT id, file_path, description FROM images ORDER BY uploaded_at DESC";
$result = $conn->query($sql);

// Handle delete request
if (isset($_POST['delete'])) {
    $image_id = $_POST['image_id'];
    $sql = "DELETE FROM images WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $image_id);
    
    if ($stmt->execute()) {
        echo "Image deleted successfully.";
    } else {
        echo "Error deleting image.";
    }
    header("Location: manageImages.php");
    exit();
}

// Handle edit request
if (isset($_POST['edit'])) {
    $image_id = $_POST['image_id'];
    $new_description = $_POST['new_description'];

    $sql = "UPDATE images SET description = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $new_description, $image_id);

    if ($stmt->execute()) {
        echo "Description updated successfully.";
    } else {
        echo "Error updating description.";
    }
    header("Location: manageImages.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Images</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
        <img src="components/WhiteCameraLogo.png" alt="Carlos Photography Logo" class="logoImage">
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Me</a></li>
                <li><a href="gallery.php">Gallery</a></li>
            </ul>
        </nav>
        <a href="contact.html">
            <button class="contact-button">Contact</button>
        </a>
    </header>

<main>
    <h2 class="dashText">Manage Images</h2>

    <div class="gallery-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="gallery">';
                echo '<img src="' . $row["file_path"] . '" alt="Gallery Image" width="200px">';
                echo '<p>' . htmlspecialchars($row["description"]) . '</p>';

                // Edit form
                echo '<form method="POST" action="manageImages.php">';
                echo '<input type="hidden" name="image_id" value="' . $row["id"] . '">';
                echo '<input type="text" name="new_description" placeholder="New description" required>';
                echo '<button type="submit" name="edit">Edit</button>';
                echo '</form>';

                // Delete form
                echo '<form method="POST" action="manageImages.php" onsubmit="return confirm(\'Are you sure you want to delete this image?\');">';
                echo '<input type="hidden" name="image_id" value="' . $row["id"] . '">';
                echo '<button type="submit" name="delete">Delete</button>';
                echo '</form>';

                echo '</div>';
            }
        } else {
            echo "<p>No images uploaded yet.</p>";
        }
        ?>
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
