<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate the credentials (replace this with your actual validation logic)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // For demonstration purposes, any username and password combination is accepted
    if ($username === 'admin' && $password === 'password') {
        // Authentication successful, set session flag
        $_SESSION['authenticated'] = true;

        // Redirect to the index page
        header('Location: index.php');
        exit();
    } else {
        // Authentication failed, display error message
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>tojojo shop Bug Bounty Labs - Admin Login</title>
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
            <h2 class="pb-2 border-bottom"><a href="../index.php" class="text-decoration-none">Labs</a> / Authentication 0x05</h2>
            
            <div class="alert alert-info" role="alert">
                <p class="no-margin">You have to login without username and password how you can?</p>
            </div>

            <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
                <div class="row">
                    <div class="col">
                        <img src="../../assets/tlogo.jpg" style="max-width: 575px">
                    </div>
                    <div class="col">
                        <h2>Login</h2>
                        <?php if (isset($error)) echo "<p>$error</p>"; ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="mb-3 form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

 
</body>

</html>
