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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>Profile</h1>
    <a href="dashboard.php">Dashboard</a> | <a href="?logout">Logout</a>
    <hr>
    <p>Username: <?php echo $userData->username; ?></p>
    <p>Is Admin: <?php echo $userData->isAdmin ? 'Yes' : 'No'; ?></p>

    <?php   if ($userData->isAdmin ) { ?>
        <h1> this is admin area</h1>
    <?php } ?>
</body>
</html>
