<?php
session_start(); // Start a session

// Connect to the database
// $conn = new mysqli("localhost", "root", "fyddiv-rEvkow-bazso6", "gallery_db");
$conn = new mysqli("sql213.infinityfree.com", "if0_38389790", "6AJvtAGwU7Qn", "if0_38389790_gallery_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare a SQL statement to fetch the hashed password
    $sql = "SELECT passwordHash FROM AuthCreds WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if a user with that username exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify the entered password with the stored hash
        if (password_verify($password, $hashed_password)) {
            $_SESSION['owner_logged_in'] = true;
            header("Location: dashboard.php"); // Redirect to owner dashboard
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>
