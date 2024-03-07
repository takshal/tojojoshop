<?php
session_start();

$users = [
    'tojojo' => ['password' => 'password', 'email' => 'tojojo@example.com'],
    'admin' => ['password' => 'SecRet', 'email' => 'admin@example.com']
];
function get_user_data($username) {
    global $users;
    return isset($users[$username]) ? $users[$username] : null;
}

// No authentication check is performed here

$targetUser = isset($_GET['username']) ? $_GET['username'] : null;
$userData = get_user_data($targetUser);
?>

<!DOCTYPE html>
<html>
<head>
    <title>tojojo shop Bug Bounty Labs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head><style> .my-color{background-color:#fff3cd}</style>
<body>


    <main>
        <div class="container py-5">
            <div class="row justify-content-end">
                <div class="col-auto">
                    <a href="/tojojoshop/instructions.php" class="btn btn-outline-secondary" data-bs-toggle="modal"
                        data-bs-target="#instructionsModal">Instructions</a>
                </div>
            </div>
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / ACCESS CONTROL 0x01</h2>

<div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
    <h1>User Profile</h1>
    <?php if ($userData !== null): ?>
        <h2>Profile Information of <?php echo $targetUser; ?></h2>
        <p>Username: <?php echo $targetUser; ?></p>
        <p>Email: <?php echo $userData['email']; ?></p>
    <?php else: ?>
        <p>Error: User data not found.</p>
    <?php endif; ?>
    <a href="index.php"> go back </a>
</div>
</body>
</html>
