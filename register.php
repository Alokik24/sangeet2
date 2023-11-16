<!-- register.html -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="icon" type="image/x-icon" href="images/logo.jpeg" />
  <title>Register</title>
</head>

<body>
  <header class="border-layout">
    <!-- <img src="images/bottom border.jpg" alt="Bottom Border Image" class="border-image bottom"> -->
    <h1 class="animated-heading">Sangeet</h1>
  </header>
  <div class="dashboard-container">
    <h2>Register</h2>

    <?php
    if (isset($_GET['error'])) {
      $error = $_GET['error'];
      switch ($error) {
        case 1:
          echo '<p class="error-message">All fields must be filled out.</p>';
          break;
        case 2:
          echo '<p class="error-message">Passwords do not match.</p>';
          break;
        case 3:
          echo '<p class="error-message">Registration failed. Please try again.</p>';
          break;
        case 4:
          echo '<p class="error-message">Invalid request method.</p>';
          break;
          // Add more cases as needed
      }
    } elseif (isset($_GET['success'])) {
      echo '<p class="success-message">Registration successful! Please login.</p>';
    }
    ?>
    <form action="register_process.php" method="post">
      <label for="name">Name:</label>
      <input type="text" name="name" required>

      <label for="contact">Contact:</label>
      <input type="text" name="contact" required>

      <label for="email">Email:</label>
      <input type="email" name="email" required>

      <label for="username">Username:</label>
      <input type="text" name="username" required>

      <label for="password">Password:</label>
      <input type="password" name="password" required>

      <label for="confirmPassword">Confirm Password:</label>
      <input type="password" name="confirmPassword" required>

      <label for="role">Role:</label>
      <select name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>

      <input type="submit" value="Register">
    </form>

    <a href="index.html">Back to Home</a>

    <script src="scripts/script.js"></script>

  </div>
  <?php include('footer.php'); ?>

</body>

</html>