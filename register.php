<?php
include 'db.php';  // Include your database connection file

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // Validate password match
    if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        // Check if email already exists in the database
        $stmt = $conn->prepare("SELECT email FROM Customers WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "Email is already registered.";
        } else {
            // Hash the password before storing it
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new user into the database
            $stmt = $conn->prepare("INSERT INTO Customers (first_name, last_name, email, password, address, phone) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $first_name, $last_name, $email, $hashed_password, $address, $phone);
            if ($stmt->execute()) {
                $success = "Registration successful! You can now <a href='login.php'>login</a>.";
            } else {
                $error = "Something went wrong. Please try again.";
            }
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - My Garden App</title>
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: Arial, sans-serif;
        }

        /* Background Image */
        .register-bg {
            background: url('your-image-url.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Centered register form */
        .register-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
        }

        .register-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .register-container label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        .register-container input[type="text"], 
        .register-container input[type="email"], 
        .register-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .register-container input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .register-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .register-container .forgot-password {
            text-align: center;
            margin-top: 10px;
        }

        .register-container .forgot-password a {
            color: #007bff;
            text-decoration: none;
        }

        .register-container .forgot-password a:hover {
            text-decoration: underline;
        }

        .register-container p {
            text-align: center;
            font-size: 14px;
        }

        .register-container p a {
            color: #007bff;
            text-decoration: none;
        }

        .register-container p a:hover {
            text-decoration: underline;
        }

        .error {
            color: #ff0000;
            font-size: 14px;
            text-align: center;
        }

        .success {
            color: #28a745;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="register-bg">
        <div class="register-container">
            <h2>Register</h2>
            <form method="POST" action="">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>

                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>

                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required>

                <input type="submit" value="Register">
            </form>

            <?php if ($error != ""): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>

            <?php if ($success != ""): ?>
                <p class="success"><?php echo $success; ?></p>
            <?php endif; ?>

            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>

</body>
</html>
