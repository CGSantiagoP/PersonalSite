<?php
session_start();
session_destroy(); // Destroy session
header("Location: index.php"); // Redirect to index/home
exit();
?>
