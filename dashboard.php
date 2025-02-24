<?php
session_start();

// Restrict access to only logged-in owners
if (!isset($_SESSION['owner_logged_in']) || $_SESSION['owner_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <a href="index.php">
            <img src="components/WhiteCameraLogo.png" alt="Carlos Photography Logo" class="logoImage">
        </a>
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
        <h2 class="dashText">Welcome, Carlos</h2>
        <p class="dashText">Manage your gallery below:</p>

        <div class="owner-buttons">
            <a href="upload.php"><button>Upload New Image</button></a>
            <a href="manageImages.php"><button>Manage Images</button></a>
            <a href="logout.php"><button>Logout</button></a>
        </div>

    </main>

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
