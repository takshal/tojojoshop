<?php
require '../db.php';
ini_set("display_errors", 0);


$showLogin = true;
$showInvalidLogin = false;
$showAccountCreated = false;
$showFailedSignUp = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['logout'])) {
        setcookie("session", "", time() - 3600);
        $page = $_SERVER['PHP_SELF'];
        header("Refresh: 0; url=$page");
        exit();
    }
    if (isset($_POST['login'])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM injection0x04 WHERE username = ? and password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $cookie = md5($username);
            setcookie("session", $cookie, time() + 3600);
            $page = $_SERVER['PHP_SELF'];
            header("Refresh: 0; url=$page");
        } else {
            $showInvalidLogin = true;
        }
        $stmt->close();
    } elseif (isset($_POST['signup'])) {
        $username = $_POST["new_username"];
        $password = $_POST["new_password"];
        $sessionCookie = md5($username);

        $sql = "INSERT INTO injection0x04 (username, password, session) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $password, $sessionCookie);

        if ($stmt->execute()) {
            $showAccountCreated = true;
        } else {
            $showFailedSignUp = true;
        }
        $stmt->close();
    }
}

if ($_COOKIE['session']) {
    $cookie = $_COOKIE['session'];

    $sql = "SELECT * FROM injection0x04 WHERE session = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cookie);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $showLogin = false;
    }

    $stmt->close();
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
            <h2 class="pb-2 border-bottom"><a href="../index.php" class="text-decoration-none">Labs</a> / SQL 0x010</h2>
            
            <div class="p-5 mb-4 my-color rounded-3">
                <div>
                    <?php
                    if ($showInvalidLogin == true) { ?>
                        <div class="alert alert-danger" role="alert">
                            <p class='no-margin'>Invalid credentials</p>
                        </div>
                    <?php } ?>
                    <?php if ($showAccountCreated == true) { ?>
                        <div class="alert alert-success" role="alert">
                            <p class='no-margin'>Account created successfully</p>
                        </div>
                    <?php } ?>
                    <?php if ($showFailedSignUp == true) { ?>
                        <div class="alert alert-danger" role="alert">
                            <p class='no-margin'>Failed to create account</p>
                        </div>
                    <?php } ?>

                    <?php if ($showLogin == true) { ?>
                        <h2 class="pb-2">Login</h2>
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
                            <button type="submit" name="login" class="btn btn-primary mb-2">Log in</button>
                        </form>
                        <hr />
                        <h2 class="pb-2">Sign Up</h2>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="new_username" class="sr-only">New Username</label>
                                    <input type="text" name="new_username" class="form-control" id="new_username" placeholder="New Username">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="new_password" class="sr-only">New Password</label>
                                    <input type="password" name="new_password" class="form-control" id="new_password" placeholder="New Password">
                                </div>
                            </div>
                            <button type="submit" name="signup" class="btn btn-success mb-2">Sign Up</button>
                        </form>
                    <?php } else {
                        $cookie = $_COOKIE['session'];
                        $sql = "SELECT username FROM injection0x04 WHERE session = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $cookie);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $username = $row["username"];

                            // vuln sql query
                            $sql_vulnerable = "SELECT bio FROM injection0x04 WHERE username = '$username'";
                            $result_vulnerable = $conn->query($sql_vulnerable);

                            if ($result_vulnerable->num_rows > 0) {
                                $row_vulnerable = $result_vulnerable->fetch_assoc();
                                $bio = $row_vulnerable["bio"];
                            } else {
                                $bio = "No bio available.";
                            }

                            echo "<h2>Welcome, " . htmlspecialchars($username) . ", to your dashboard!</h2>";
                            echo "<p>Bio: " . htmlspecialchars($bio) . "</p>"; // Always sanitize output to prevent XSS
                            echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">';
                            echo '<button type="submit" name="logout" class="btn btn-danger">Logout</button>';
                            echo '</form>';
                        } else {
                            echo "<h2>Error fetching account data!</h2>";
                            echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">';
                            echo '<button type="submit" name="logout" class="btn btn-danger">Logout</button>';
                            echo '</form>';
                        }
                    } ?>

                </div>

            </div>
        </div>
    </main>


</body>

</html>