<?php include 'db.php'; ?>
<?php
session_start();
include 'db.php';
if (!isset($_SESSION['customer_id'])) {
    header('Location: login.php');
    exit();
}


// Check if user is logged in (assuming you're using user_email in session)
$isLoggedIn = isset($_SESSION["user_email"]);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <link rel="stylesheet" href="Style-1.css">

    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>


    <header>
        <div class="logo">
            <img src="logo-3.jpg" alt="Your Logo" class="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="index-1.html">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li class="dropdown">
                    <a href="#">About</a> 
                    <div class="dropdown-content">
                        <a href="Zaiba.html">Zaiba</a>
                        <a href="Cecil.html">Cecil</a>
                        <a href="Laval.html">Lawal</a>
                        <a href="Arpan.html">Arpan</a>
                    </div>
                </li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
        <div class="search-container">
            <input type="text" id="search-input" placeholder="Search for an item...">
            <button id="search-button">Search</button>
        </div>
		<?php if ($isLoggedIn): ?>
			<div class="dropdown" style="margin-left: 20px;">
				<button class="dropbtn">
					<?php echo isset($_SESSION['first_name']) ? $_SESSION['first_name'] : 'My Account'; ?>
				</button>
				<div class="dropdown-content">
				<a href="account.php">Account Settings</a>
				<a href="change_password.php">Change Password</a>
				<a href="logout.php">Logout</a>
				</div>
			</div>
		<?php else: ?>
    <a href="login.php" class="login-button">Login</a>
		<?php endif; ?>

    
        <p id="search-message"></p>
    
        <!-- Centered Modal -->
        <div id="search-modal" class="modal">
            <p id="modal-text"></p>
            <button id="close-modal">Close</button>
        </div>
    
        <script src="script.js"></script>
        
    </header>

    <section class="hero">
        <img src="HERO.webp" alt="Hero Image">
        <div class="hero-text">
            <h1>Grow Your Own Garden</h1>
            <p>Shop for the best seeds for Gardening.</p>
            <a href="#">Shop Now</a>
        </div>
    </section>


    <section class="categories">
        <h2>Shop by Category</h2>
        <div class="category-grid">
<?php
$sql = "SELECT * FROM Products LIMIT 6"; // Adjust the number or add WHERE clause for category
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    $name = htmlspecialchars($row['name']);
	$desc = htmlspecialchars($row['description']);
	$img = htmlspecialchars($row['image_url']);
	$id = (int)$row['id']; // assuming you have an 'id' field in your Products table

	echo "<div class='category-item'>";
	echo "<img src='$img' alt='$name'>";
	echo "<p>$name</p>";
	echo "<p class='category-description'>$desc</p>";
	echo "<a href='product-details.php?id=$id' class='view-button'>View Product</a>";
	echo "</div>";


    }
} else {
    echo "<p>No products found.</p>";
}
?>
</div>

    
        <div id="sub-categories" class="sub-categories">
            <!-- Sub-categories will appear here dynamically -->
        </div>
    </section>
    

    <script src="javascript-1.js"></script>
</body>
</html>
