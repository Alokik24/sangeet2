<?php
// trending.php

include 'connection.php';

// Function to get trending songs from the database
function getTrendingSongs($conn) {
    // Replace the following SQL query with your actual query to retrieve trending songs
    $sql = "SELECT id, title, artist, file_path, likes FROM songs ORDER BY likes DESC LIMIT 10";
    $result = $conn->query($sql);

    // Check if there are results
    if ($result->num_rows > 0) {
        // Fetch the results into an associative array
        while ($row = $result->fetch_assoc()) {
            $trendingSongs[] = $row;
        }
    } else {
        $trendingSongs = array(); // No results, initialize an empty array
    }

    return $trendingSongs;
}

// Usage example
$trendingSongs = getTrendingSongs($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trending</title>
  <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
  <div class="container">
    <h1>Trending Songs</h1>

    <ul>
      <?php foreach ($trendingSongs as $song): ?>
        <li>
          <span><?php echo $song['title']; ?> by <?php echo $song['artist']; ?></span>
          <audio controls>
            <source src="<?php echo $song['file_path']; ?>" type="audio/mp3">
            Your browser does not support the audio element.
          </audio>
          <button onclick="likeSong(<?php echo $song['id']; ?>)">Like</button>
          <span id="song-<?php echo $song['id']; ?>-likes">Likes: <?php echo $song['likes']; ?></span>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

  <script src="scripts/script.js"></script>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>
