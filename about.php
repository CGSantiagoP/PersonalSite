<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me | Carlos's Gallery</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>

    <header>
        <img src="components/CPhotoLogo.png" alt="Carlos Photography Logo" class="logoImage">
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
    </header>


    <div class="row">
        <div class="column" style="background-color:#aaa;">
            <h1>Greeting Img</h1>
            <p> Other Image </p>
        </div>
        
        <div class="column" style="background-color:#bbb;">
            <h1> I'm Carlos </h1>
            <p>
                I am a starting photographer from the bay area.
            </p>
            <p>
                I have started by shooting mostly portraits and 
                nature.  
            </p>
            <p>
                My current set-up is a Sony a7sII paired with a 
                Sony 50mm f1.8
            </p>
            <p>
                I am trying to learn more with this lens 
                while I am searching for the next.
            </p>

        </div>
    
    </div>

</body>
</html> -->









<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me | Carlos's Gallery</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Header (Same Across Pages) -->
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

    <!-- About Me Section -->
    <section class="about">
        <div class="about-container">
            <!-- TODO: Create image here -->
            <img src="components/CPhotoLogo.png" alt="Carlos Photography Logo" class="profile-img"> 
            <div class="about-text">
                <h1>Hi, I'm Carlos!</h1>
                <div class="bio">
                    I'm a passionate web developer and digital creator. My journey in web development started with a love for design and technology, and I've been building engaging online experiences ever since.
                    <br><br>
                    When I'm not coding, I enjoy photography, hiking, and discovering new coffee spots. My goal is to create seamless, user-friendly websites that make an impact.
                    <br><br>
                    Let's connect and create something awesome together!
                </div>
                <a href="contact.html" class="btn">Get in Touch</a>
            </div>
        </div>
    </section>


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