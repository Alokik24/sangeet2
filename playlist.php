<?php
include 'connection.php';

// Get playlist ID from the URL
$playlistId = $_GET['id'];

// Function to get playlist details and songs using prepared statements
function getPlaylistDetails($conn, $playlistId) {
    $sql = "SELECT playlists.name AS playlist_name, songs.title, songs.artist, songs.file_path
            FROM playlist_songs
            JOIN playlists ON playlist_songs.playlist_id = playlists.id
            JOIN songs ON playlist_songs.song_id = songs.id
            WHERE playlists.id = ?";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $playlistId);
    $stmt->execute();
    
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $playlistDetails = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $playlistDetails = array();
    }

    $stmt->close();

    return $playlistDetails;
}

// Get playlist details
$playlistDetails = getPlaylistDetails($conn, $playlistId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <div class="container">
        <?php if (!empty($playlistDetails)): ?>
            <h1><?php echo $playlistDetails[0]['playlist_name']; ?></h1>

            <ul>
                <?php foreach ($playlistDetails as $song): ?>
                    <li>
                        <span><?php echo $song['title']; ?> by <?php echo $song['artist']; ?></span>
                        <audio controls>
                            <source src="<?php echo $song['file_path']; ?>" type="audio/mp3">
                            Your browser does not support the audio element.
                        </audio>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Playlist details not found.</p>
        <?php endif; ?>
    </div>

    <script src="scripts/script.js"></script>
</body>

</html>

<?php
$conn->close();
?>
