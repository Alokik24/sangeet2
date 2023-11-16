<?php
// Include your database connection code here
include "connection.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $songId = $data['songId'];

    // Update the likes count in the database
    $query = "UPDATE songs SET likes = likes + 1 WHERE id = $songId";
    mysqli_query($conn, $query);

    // Fetch the updated likes count
    $result = mysqli_query($conn, "SELECT likes FROM songs WHERE id = $songId");
    $row = mysqli_fetch_assoc($result);
    
    echo json_encode(['success' => true, 'likes' => $row['likes']]);
} else {
    echo json_encode(['success' => false]);
}
?>
