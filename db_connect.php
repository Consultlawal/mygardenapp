<?php
$servername = "localhost";
$username = "root";
$password = ""; // Leave this empty if you're using XAMPP with no password
$dbname = "mygardenapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
