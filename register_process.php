<?php
session_start();
require_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Using htmlspecialchars for sanitization
    $name = htmlspecialchars($_POST["name"]);
    $contact = htmlspecialchars($_POST["contact"]);
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ? htmlspecialchars($_POST["email"]) : null;
    $username = htmlspecialchars($_POST["username"]);
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $role = isset($_POST["role"]) ? htmlspecialchars($_POST["role"]) : "user"; // Default role is set to 'user'

    // Additional validation
    if (empty($name) || empty($contact) || empty($email) || empty($username) || empty($password) || empty($confirmPassword)) {
        header("Location: register.php?error=1");
        exit();
    }

    if ($password !== $confirmPassword) {
        header("Location: register.php?error=2");
        exit();
    }

    // Check if email and username are unique
    $checkUnique = "SELECT id FROM users WHERE email = ? OR username = ?";
    $stmtCheck = $conn->prepare($checkUnique);
    $stmtCheck->bind_param("ss", $email, $username);
    $stmtCheck->execute();
    $resultCheck = $stmtCheck->get_result();

    if ($resultCheck->num_rows > 0) {
        // Email or username already exists
        header("Location: register.php?error=5");
        exit();
    }

    // Hash the password before storing it in the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Perform the database query to insert the user
    $sql = "INSERT INTO users (name, contact, email, username, password, role) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $contact, $email, $username, $hashedPassword, $role);
    $result = $stmt->execute();

    if ($result) {
        // Registration successful, redirect to login.php with success message
        header("Location: login.php?success=1");
        exit();
    } else {
        // Registration failed, redirect to register.php with error message
        header("Location: register.php?error=3");
        exit();
    }
} else {
    // Invalid request method, redirect to register.php with error message
    header("Location: register.php?error=4");
    exit();
}
?>
