<?php
session_start();

$users = [
    'tojojo' => ['password' => 'password', 'email' => 'tojojo@example.com'],
    'admin' => ['password' => 'SecRet', 'email' => 'admin@example.com']
];

function authenticate($username, $password) {
    global $users;
    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        $_SESSION['username'] = $username;
        return true;
    }
    return false;
}

function is_logged_in() {
    return isset($_SESSION['username']);
}

function get_user_data($username) {
    global $users;
    return isset($users[$username]) ? $users[$username] : null;
}

function logout() {
    session_unset();
    session_destroy();
}

// Login logic
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (authenticate($username, $password)) {
        header('Location: profile.php?username='.$username);
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}

// Logout logic
if (isset($_POST['logout'])) {
    logout();
    header('Location: index.php');
    exit;
}
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

            <div class="alert alert-info" role="alert">
                <p class="no-margin">Test account: tojojo:password</p>
                <p class="no-margin">Target account: Admin</p>
            </div>

    <?php if (is_logged_in()): ?>
        <div class="alert alert-success" role="success"><p class="no-margin">You are logged in as <?php echo $_SESSION['username']; ?></p></div>
        <form action="" method="post">
            <input type="submit" name="logout" value="Logout" class="btn btn-danger">
        </form>
    <?php else: ?>
        <h2>Login</h2>
        <?php if (isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
        <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
        <form action="" method="post">
            <div class="mb-3 form-group">
                        <label for="username">username</label>
                        <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp"
                            placeholder="Enter username">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="password">password</label>
                        <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp"
                            >
                    </div>
                    
                    <div class="mb-3">
                        <input type="submit" name="login" class="btn btn-primary" value="login">
                    </div>
        </form>
        </div>
    <?php endif; ?>
</body>
</html>
