<?php
include 'connection.php';

// Function to get user playlists
function getUserPlaylists($conn, $userId) {
    $sql = "SELECT id, name FROM playlists WHERE user_id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $playlists[] = $row;
        }
    } else {
        $playlists = array();
    }

    return $playlists;
}

// Function to get liked songs playlist
function getLikedSongsPlaylist($conn, $userId) {
    // Assuming you have a table named "likes" to store liked songs
    $sql = "SELECT songs.id, songs.title, songs.artist, songs.file_path FROM songs
            JOIN likes ON songs.id = likes.song_id
            WHERE likes.user_id = $userId";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $likedSongsPlaylist[] = $row;
        }
    } else {
        $likedSongsPlaylist = array();
    }

    return $likedSongsPlaylist;
}

// Get user ID (You need to implement user authentication)
$userId = 1; // Replace with the actual user ID

// Get user playlists
$userPlaylists = getUserPlaylists($conn, $userId);

// Get liked songs playlist
$likedSongsPlaylist = getLikedSongsPlaylist($conn, $userId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlists</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <div class="container">
        <h1>Your Playlists</h1>

        <!-- Display user playlists -->
        <ul>
            <?php foreach ($userPlaylists as $playlist): ?>
                <li>
                    <a href="playlist.php?id=<?php echo $playlist['id']; ?>"><?php echo $playlist['name']; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Display Liked Songs playlist -->
        <h2>Liked Songs</h2>
        <ul>
            <?php foreach ($likedSongsPlaylist as $song): ?>
                <li>
                    <span><?php echo $song['title']; ?> by <?php echo $song['artist']; ?></span>
                    <audio controls>
                        <source src="<?php echo $song['file_path']; ?>" type="audio/mp3">
                        Your browser does not support the audio element.
                    </audio>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Form to create a new playlist -->
        <h2>Create Playlist</h2>
        <form action="create_playlist.php" method="post">
            <label for="playlistName">Playlist Name:</label>
            <input type="text" id="playlistName" name="playlistName" required>
            <button type="submit">Create Playlist</button>
        </form>
    </div>

    <script src="scripts/script.js"></script>
</body>

</html>

<?php
$conn->close();
?>
