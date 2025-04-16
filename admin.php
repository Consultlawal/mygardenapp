<?php
session_start();

// Check if the user is logged in and if they are an admin
if (!isset($_SESSION['customer_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // Redirect to login page if not logged in or not an admin
    exit();
}

// Display admin dashboard
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            padding: 14px 20px;
            text-align: center;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .container {
            padding: 20px;
        }
        .dashboard {
            text-align: center;
        }
        .dashboard h2 {
            color: #333;
        }
        .logout-btn {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .logout-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <a href="admin-dashboard.php">Dashboard</a>
        <a href="manage-users.php">Manage Users</a>
        <a href="view-orders.php">View Orders</a>
        <a href="settings.php">Settings</a>
    </div>

    <div class="container">
        <div class="dashboard">
            <h2>Welcome, Admin <?php echo $_SESSION['first_name']; ?>!</h2>
            <p>Manage users, view orders, and configure settings from here.</p>

            <!-- Logout Button -->
            <form action="logout.php" method="POST">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

</body>

</html>
