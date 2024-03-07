<?php
session_start();

$users = [
    'tojojo' => ['password' => 'password', 'email' => 'tojojo@example.com'],
];

function get_user_data($username) {
    global $users;
    return isset($users[$username]) ? $users[$username] : null;
}

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$currentUser = $_SESSION['username'];
$userData = get_user_data($currentUser);
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
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / ACCESS CONTROL 0x02</h2>

<div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
    <h1>User Profile</h1>
    <?php if ($userData !== null): ?>
        <h2>Profile information of <?php echo $currentUser; ?></h2>
        <p>Username: <?php echo $currentUser; ?></p>
        <p>Email: <?php echo $userData['email']; ?></p>
    <?php else: ?>
        <p>Error: User data not found.</p>
    <?php endif; ?>
    <?php  if(isset($_COOKIE['is_admin'])) { if ($_COOKIE['is_admin'] == True) {
        ?><h2> Admin Dashboard</h2><h3> List of Users</h3> 'tojojo' => ['password' => 'password', 'email' => 'tojojo@example.com']<br>
   <?php } } ?>
    <a href="index.php"> go back </a>
</div>
</body>
</html>
