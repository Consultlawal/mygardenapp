<?php
session_start();
include 'db.php';

// Redirect if not logged in
if (!isset($_SESSION["user_email"])) {
    header("Location: login.php");
    exit();
}

$message = "";

// Form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION["user_email"];
    $current = $_POST["current_password"];
    $new = $_POST["new_password"];
    $confirm = $_POST["confirm_password"];

    // Get current hashed password from DB
    $query = "SELECT password FROM users WHERE email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();
    $stmt->close();

    if (!password_verify($current, $hashedPassword)) {
        $message = "❌ Current password is incorrect.";
    } elseif ($new !== $confirm) {
        $message = "❌ New passwords do not match.";
    } else {
        // Update password
        $newHashed = password_hash($new, PASSWORD_DEFAULT);
        $updateQuery = "UPDATE users SET password=? WHERE email=?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ss", $newHashed, $email);
        if ($stmt->execute()) {
            $message = "✅ Password changed successfully!";
        } else {
            $message = "❌ Something went wrong.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f4f4f4; }
        .form-container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        input[type="password"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .message { color: red; margin-top: 10px; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Change Password</h2>
    <form method="POST">
        <label>Current Password</label>
        <input type="password" name="current_password" required>

        <label>New Password</label>
        <input type="password" name="new_password" required>

        <label>Confirm New Password</label>
        <input type="password" name="confirm_password" required>

        <input type="submit" value="Update Password">
    </form>
    <div class="message"><?php echo $message; ?></div>
</div>

</body>
</html>
