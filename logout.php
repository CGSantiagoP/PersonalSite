<?php
session_start();
session_destroy();
header("Location: index.php"); // Redirect to index/home
exit();
?>
