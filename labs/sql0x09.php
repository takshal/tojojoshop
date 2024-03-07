<?php
require '../db.php';
ini_set("display_errors", 0);

session_start(); 
$showLogin = true;
$showInvalidLogin = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM injection0x03 WHERE username = ? and password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // set a cookie & reload the page
        $cookie = md5($username);
        setcookie("session", $cookie, time() + 3600);
        $page = $_SERVER['PHP_SELF'];
        header("Refresh: 0; url=$page");
    } else {
        $showInvalidLogin = true;
    }
    $stmt->close();
}

// check session cookie
if (isset($_COOKIE['session'])) {
    // echo $_COOKIE['session'];
    $cookie = $_COOKIE['session'];

    $sql = "SELECT * FROM injection0x03 WHERE session = '$cookie'";

    // print_r($sql);
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $showLogin = false;
    }
}
$conn->close();
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
            <h2 class="pb-2 border-bottom"><a href="../index.php" class="text-decoration-none">Labs</a> / SQL 0x09</h2>
            <div class="alert alert-info" role="alert">
                <p class='no-margin'>Default credentials: tojojo:hacker</p>
            </div>

            <div class="p-5 mb-4 my-color rounded-3">
                <div>
                    <?php
                    if ($showInvalidLogin == true) { ?>
                        <div class="alert alert-danger" role="alert">
                            <p class='no-margin'>Invalid credentials</p>
                        </div>
                    <?php } ?>
                    <?php if ($showLogin == true) { ?>
                        <h2>Login</h2>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Log in</button>
                        </form>
                    <?php } else { ?>
                        <h2>Welcome to your dashboard!</h2>
                    <?php } ?>
                </div>

            </div>
        </div>
    </main>

   
</body>

</html>