<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = 1; // Replace with the actual user ID
    $playlistName = $_POST["playlistName"];

    $sql = "INSERT INTO playlists (user_id, name) VALUES ($userId, '$playlistName')";

    if ($conn->query($sql) === TRUE) {
        // Playlist created successfully
        header("Location: playlists.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
