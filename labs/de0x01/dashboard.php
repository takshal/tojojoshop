<?php

include 'index.php';
// Check if the user is logged in
if (!isset($_COOKIE['userdata'])) {
    header("Location: login.php");
    exit();
}

// Deserialize user data from cookie
$userData = unserializeUserData($_COOKIE['userdata']);

// Redirect to login page if userdata is invalid or empty
if (!$userData || empty($userData->username)) {
    header("Location: login.php");
    exit();
}

// Display different content for admin and normal users
$pageContent = '';
if ($userData->isAdmin) {
    // Admin Dashboard
    $pageContent = "<h2>Welcome, Admin {$userData->username}</h2>";
    $pageContent .= "<p>Admin Dashboard Content Here...</p>";
} else {
    // Normal User Dashboard
    $pageContent = "<h2>Welcome, {$userData->username}</h2>";
    $pageContent .= "<p>Normal User Dashboard Content Here...</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <a href="profile.php">Profile</a> | <a href="?logout">Logout</a>
    <hr>
    <?php echo $pageContent; ?>
</body>
</html>
