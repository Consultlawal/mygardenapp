<?php
include 'db_connect.php';

$sql = "SELECT * FROM items";
$result = $conn->query($sql);

$items = [];
while ($row = $result->fetch_assoc()) {
    $items[] = $row;
}

echo json_encode($items); // Convert data to JSON for frontend usage
?>
