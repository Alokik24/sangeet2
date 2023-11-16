<?php
session_start(); // Start the session
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // If the user is not logged in or not an admin, redirect to the login page
    header("Location: login.php");
    exit();
}

// Rest of the admin panel code
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Admin Panel</title>
</head>

<body>
  <?php include('header.php'); ?>
  <div class="dashboard-container">
    <?php include('burger_menu.php'); ?>

    <h2>Admin Panel</h2>
    <!-- Add your admin panel content here -->

    <a href="logout.php">Logout</a>

    <script src="script.js"></script>

    <?php include('footer.php'); ?>
  </div>
</body>

</html>