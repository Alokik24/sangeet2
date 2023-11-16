<?php
include 'connection.php';

// Assume the user is already authenticated
// You may use session variables or any authentication mechanism

// Function to get user details
function getUserDetails($conn, $userId) {
    $sql = "SELECT id, username, email, role FROM users WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userDetails = $result->fetch_assoc();
    } else {
        $userDetails = array();
    }

    $stmt->close();

    return $userDetails;
}

// Assume the user is already authenticated and their ID is known
$userId = 1; // Replace with the actual user ID

// Get user details
$userDetails = getUserDetails($conn, $userId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <div class="container">
        <?php if (!empty($userDetails)): ?>
            <h1>Account Details</h1>
            <p>ID: <?php echo $userDetails['id']; ?></p>
            <p>Username: <?php echo $userDetails['username']; ?></p>
            <p>Email: <?php echo $userDetails['email']; ?></p>
            <p>Role: <?php echo $userDetails['role']; ?></p>

            <?php if ($userDetails['role'] === 'admin'): ?>
                <!-- Admin-specific content or links can go here -->
                <p>This is the admin panel content.</p>
            <?php endif; ?>
        <?php else: ?>
            <p>User details not found.</p>
        <?php endif; ?>
    </div>

    <script src="scripts/script.js"></script>
</body>

</html>

<?php
$conn->close();
?>
