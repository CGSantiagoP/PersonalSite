<?php
// $conn = new mysqli("localhost", "root", "fyddiv-rEvkow-bazso6", "gallery_db");
$conn = new mysqli("sql213.infinityfree.com", "if0_38389790", "6AJvtAGwU7Qn", "if0_38389790_gallery_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully!";
?>
