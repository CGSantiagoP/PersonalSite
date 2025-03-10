<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>

    <!-- <header>
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
            <button class="contact-button" >Contact</button>
        </a>
    </header> -->
    <?php include 'components/header.html'; ?>

    <main class="contact-container">
        <h2 class="contact-heading">Contact Me</h2>
        <form id="contactForm"
            action="https://formspree.io/f/xvgznnnb"
            method="POST"
            enctype="multipart/form-data"
            class="contact-form">
            
            <label for="email" class="contact-label">Your Email:</label>
            <input type="email" id="email" name="email" required autocomplete="email" aria-label="Your email" class="contact-input">
            
            <label for="message" class="contact-label">Your Message:</label>
            <textarea id="message" name="message" required aria-label="Your message" class="contact-textarea"></textarea>
    
            <!-- Hidden honeypot field for spam protection -->
            <input type="text" name="_gotcha" style="display: none;">
    
            <button type="submit" class="contact-button">Send</button>
        </form>
    </main>

     <!-- Footer Section -->
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


<?php
$conn->close();
?>