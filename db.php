<?php
// $servername = "localhost:3307";
// $username = "root";
// $password = ""; // default password is empty in XAMPP
// $database = "GardenShop";

// Create connection
// $conn = new mysqli($servername, $username, $password, $database);

// Check connection
// if ($conn->connect_error) {
    // die("Connection failed: " . $conn->connect_error);
// }

// echo "Connected successfully";

$servername = "db";          // Docker service name, not localhost
$username = "root";
$password = "yourpassword";  // Must match MYSQL_ROOT_PASSWORD in docker-compose.yml
$database = "GardenShop";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully";
?>
