<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Logout</title>
</head>

<body>
  <?php
  session_start(); // Start the session
  session_destroy(); // Destroy the session
  header("Location: login.php"); // Redirect to the login page after logout
  exit();
  ?>
  <?php include('header.php'); ?>
  <div class="dashboard-container">

    <h2>Logout</h2>
    <!-- Add your logout content or any confirmation message -->

    <script src="script.js"></script>

    <?php include('footer.php'); ?>
  </div>
</body>

</html>