<?php
require '../db.php';
ini_set("display_errors", 0);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $status = 0;

    if ($username === "tojojo" && $password === "dhakken") {
        $message = "You have successfully logged in!";
        $status = 1;
    } else {
        $message = "Your username or password was incorrect!";
        $status = 2;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>tojojo shop Bug Bounty Labs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style> .my-color{background-color:#fff3cd}</style>
<body>
    <main>
        <div class="container py-5">
           <div class="row justify-content-end">
                <div class="col-auto">
                    <a href="/tojojoshop/instructions.php" class="btn btn-outline-secondary" data-bs-toggle="modal"
                        data-bs-target="#instructionsModal">Instructions</a>
                </div>
            </div>
            <h2 class="pb-2 border-bottom"><a href="../index.php" class="text-decoration-none">Labs</a> / Authentication  0x01</h2>
            <div class="alert alert-info" role="alert">
                <p class="no-margin">Target account: tojojo</p>
            </div>

            <?php
            if ($status == 2) {
                echo '<div class="alert alert-danger" role="danger"><p class="no-margin">' . $message . '</p></div>';
            } elseif ($status == 1) {
                echo '<div class="alert alert-success" role="success"><p class="no-margin">' . $message . '</p></div>';
            }
            ?>

            <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
                <h2>Login</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="mb-3 form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </main>

    
</body>

</html>