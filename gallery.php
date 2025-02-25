<?php
// Connect to database
error_reporting(E_ALL);
ini_set('display_errors', 1);


$conn = new mysqli("sql213.infinityfree.com", "if0_38389790", "6AJvtAGwU7Qn", "if0_38389790_gallery_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch images from the database
$sql = "SELECT file_path, description FROM images ORDER BY uploaded_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>

    <header>
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
    </header>

    <main>
        <h2 class="dashText">Welcome to the Gallery Page</h2>
        <p class="dashText">Here are the uploaded pictures:</p>

        <?php if (isset($_SESSION['owner_logged_in']) && $_SESSION['owner_logged_in'] == true):?>
            <div class="admin-panel">
                <div class="owner-buttons">
                    <a href="upload.php"><button>Upload New Image</button></a>
                    <a href="manageImages.php"><button>Manage Images</button></a>
                    <a href="logout.php"><button>Logout</button></a>
                </div>
            </div>
        <?php endif; ?>

        <!-- Gallery Display -->
        <div class="gallery-container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="gallery">';
                    echo '<a target="_blank" href="' . $row["file_path"] . '">';
                    echo '<img src="' . $row["file_path"] . '" alt="Gallery Image" width="200px">';
                    echo '</a>';
                    echo '<div class="description">' . htmlspecialchars($row["description"]) . '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No images uploaded yet.</p>";
            }
            ?>
        </div>
    </main>

    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <p>&copy; 2025 Carlos's Gallery. All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="index.php">Home</a></li>
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

<?php
$conn->close();
?>
