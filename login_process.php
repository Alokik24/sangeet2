<?php
require_once("connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Login successful, set session variables
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];

            // Redirect based on user role
            if ($row["role"] == "admin") {
                header("Location: admin_panel.php");
            } else {
                header("Location: user_dashboard.php");
            }
            exit();
        } else {
            echo "Incorrect password! Please <a href='login.php'>try again</a>.";
        }
    } else {
        echo "User not found! Please <a href='register.php'>register here</a>.";
    }
}

$conn->close();
?>
