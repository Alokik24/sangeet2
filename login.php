<!-- login.html -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="icon" type="image/x-icon" href="images/logo.jpeg" />
  <title>Login</title>
</head>

<body>
<header class="border-layout">
    <!-- <img src="images/bottom border.jpg" alt="Bottom Border Image" class="border-image bottom"> -->
    <h1 class="animated-heading">Sangeet</h1>
  </header>
  <div class="dashboard-container">
    <h2>Login</h2>

    <form action="login_process.php" method="post">
      <label for="email">Email:</label>
      <input type="email" name="email" required>

      <label for="password">Password:</label>
      <input type="password" name="password" required>

      <input type="submit" value="Login">
    </form>

    <a href="index.html">Back to Home</a>

    <script src="script.js"></script>

  </div>
  <?php include('footer.php'); ?>

</body>

</html>
