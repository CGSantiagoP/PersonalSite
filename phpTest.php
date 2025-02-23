<?php
$conn = new mysqli("localhost", "root", "fyddiv-rEvkow-bazso6", "gallery_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully!";
?>
