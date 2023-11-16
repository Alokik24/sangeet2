<?php
session_start();

// Check if the user is logged in and has the 'user' role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php"); // Redirect to the login page if not logged in as a user
    exit();
}

// Your user dashboard content goes here
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/main.css">
  <link rel="icon" type="image/x-icon" href="images/logo.jpeg" />
  <!-- Other head elements -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <title>User Dashboard</title>
</head>

<body>
  <div class="dashboard-container">
    <div class="logo">
      <h1>Sangeet</h1>
      <p>Your Melodic Journey</p>
    </div>

    <!-- Left Section -->
    <div class="left-section">
      <nav class="left-nav-links">
        <a href="trending.php">Trending</a>
        <a href="playlists.php">Playlists</a>
        <a href="account.php">Account</a>
        <a href="add_songs.php">Add Songs</a>
        <a href="equalizer.php">Equalizer</a>
        <a href="logout.php">Logout</a>
      </nav>
    </div>

    <!-- Main Section -->
    <div class="main-section">
      <!-- Music Player -->
      <div id="music-player" class="music-player">
        <?php
        // Assuming $songIcon is a variable that contains the path to the song icon
        $songIcon = 'path/to/song/icon.jpg';

        // Check if the song icon is available
        if (!empty($songIcon)) {
          echo "<div class='song-icon' style='background-image: url(\"$songIcon\")'></div>";
        }
        ?>
        <div class="arrow-icon" onclick="toggleMusicPlayer()">
          <span class="arrow-up">▲</span>
          <span class="arrow-down">▼</span>
        </div>
        <p id="now-playing">Now Playing: <span id="song-title">Song Title</span> by <span id="artist">Artist</span></p>
        <!-- Music Player Controls -->
        <div class="music-player-controls">
          <button id="playPauseBtn" onclick="togglePlayPause()"><i class="fas fa-play"></i></button>
          <button onclick="previousSong()"><i class="fas fa-step-backward"></i></button>
          <button onclick="nextSong()"><i class="fas fa-step-forward"></i></button>
          <button id="volumeBtn" onclick="toggleMute()"><i class="fas fa-volume-up"></i></button>
        </div>
      </div>

      <!-- Recommendations -->
      <section id="recommendations" class="dashboard-section">
        <h2>Recommendations</h2>
        <div class="recommendations">
          <?php
          // Placeholder data for recommendations
          $recommendations = [
            ['icon' => 'icon1.jpg', 'title' => 'Song 1', 'artist' => 'Artist 1', 'genre' => 'Pop'],
            ['icon' => 'icon2.jpg', 'title' => 'Song 2', 'artist' => 'Artist 2', 'genre' => 'Rock'],
            // Add more recommendations as needed
            // ...
          ];

          // Loop through recommendations
          foreach ($recommendations as $recommendation) {
            echo "<div class='recommendation-section'>";
            echo "<img src='{$recommendation['icon']}' alt='Recommendation Icon'>";
            echo "<div class='details'>";
            echo "<h3>{$recommendation['title']}</h3>";
            echo "<p>{$recommendation['artist']}</p>";
            echo "<p>{$recommendation['genre']}</p>";
            echo "</div>";
            echo "</div>";
          }
          ?>
        </div>
      </section>
    </div>
  </div>
  <footer class="footer">
    &copy; 2023 Sangeet - Your Melodic Journey
  </footer>

  <script src="scripts/script.js"></script>
</body>

</html>
