<?php
session_start(); // Start a session

// Connect to the database
$conn = new mysqli("sql213.infinityfree.com", "if0_38389790", "6AJvtAGwU7Qn", "if0_38389790_gallery_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT passwordHash FROM AuthCreds WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['owner_logged_in'] = true;
            header("Location: dashboard.php"); 
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
