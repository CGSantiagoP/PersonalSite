<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Carlos Photography</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <img src="components/WhiteCameraLogo.png" alt="Carlos Photography Logo" class="logoImage">
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
        <h2 class="dashText">Welcome to Carlos's Photography</h2>
        
        <!-- Display admin options only if logged in -->
        <?php if (isset($_SESSION['owner_logged_in']) && $_SESSION['owner_logged_in'] === true): ?>
            <div class="admin-panel">
                <div class="owner-buttons">
                    <a href="upload.php"><button>Upload New Image</button></a>
                    <a href="manageImages.php"><button>Manage Images</button></a>
                    <a href="logout.php"><button>Logout</button></a>
                </div>
            </div>
        <?php endif; ?>


        <section>
            <div class="row">
                <div class="column" style="background-color:rgb(208, 206, 206);">
                    <h1 class="indexQuote">"To see a world in a grain of sand, and a heaven in a wild flower, Hold infinity in the palm of your hand, And eternity in an hour."</h1>
                    <p class="indexQuoteAuthor"> - William Blake</p>
                </div>
                
                <div class="column" style="background-color:rgb(237, 234, 234);">
                    <img src="components/indexCat.jpeg" alt="Picture of a pensive cat" class="indexImage">
                </div>
            </div>
        </section>
        
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
