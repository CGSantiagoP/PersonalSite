<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Login</title>
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
        <h2>Owner Login</h2>
        <form action="authenticate.php" method="POST">
            <label for="username" class="dashText">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password" class="dashText">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </main>

    <footer>
        <div class="footer-container">
            <p>&copy; 2025 Carlos's Gallery. All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Me</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
    </footer>

</body>
</html>
