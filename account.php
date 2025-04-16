<?php
session_start();
if (!isset($_SESSION["user_email"])) {
    header("Location: login.php");
    exit();
}
echo "<h2>Welcome to your Account Settings, " . $_SESSION["user_email"] . "!</h2>";
?>
