<?php
require '../db.php';
// ini_set("display_errors", 0);
// check for cookie
$cookie = false;
$status=0;
if (isset($_COOKIE["csrf0x02"])) {
    $username = $_COOKIE["csrf0x02"];
    $cookie = true;
    $email = "";

    // grab data from db
    $sql = "SELECT * FROM csrf0x02 WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row["email"];
        print_r($email);
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $status = 0;

        if ($username === "tojojo" && $password === "hacker") {
            $message = "You have successfully logged in!";
            $cookie_name = "csrf0x02";
            $cookie_value = "tojojo";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            $status = 1;
        } elseif ($username === "dhakkan" && $password === "dhakkan") {
            $message = "You have successfully logged in!";
            $cookie_name = "csrf0x02";
            $cookie_value = "dhakkan";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            $status = 1;
        } else {
            $message = "Your username or password was incorrect!";
            $status = 2;
        }
    } elseif (isset($_POST["logout"])) {
        setcookie("csrf0x02", "tojojo", time() - 3600, "/");
        setcookie("csrf0x02", "dhakkan", time() - 3600, "/");
        $message = "You logged out!";
        $status = 2;
        $cookie = false;
    } elseif (isset($_POST["email"]) && isset($_POST["csrf"])) {
        $sql = "UPDATE csrf0x02 SET email = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $new_email, $username);
        $new_email = $_POST["email"];

        if ($stmt->execute()) {
            $email = $_POST["email"];
            $message = "Email for " . $_COOKIE["csrf0x02"] . " successfully updated";
            $status = 1;
        } else {
            $message = "There was an error " . $stmt->error;
            $status = 2;
        }
    } elseif (isset($_POST["email"]) && !isset($_POST["csrf"])) {
        $message = "Missing CSRF token";
        $status = 2;
    } else {
        $message = "There was an error with your request!";
        $status = 2;
    }
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
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / CSRF 0x03</h2>

            <div class="alert alert-info" role="alert">
                <p class="no-margin">Test account: tojojo:hacker</p>
                <p class="no-margin">Target account: dhakkan:dhakkan</p>
            </div>

            <?php
            if ($status == 2) {
                echo '<div class="alert alert-danger" role="danger"><p class="no-margin">' . $message . '</p></div>';
            } elseif ($status == 1) {
                echo '<div class="alert alert-success" role="success"><p class="no-margin">' . $message . '</p></div>';
            }
            ?>

            <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
                <?php if ($status === 1 || $cookie === true) {
                    // generate csrf token
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $csrf = '';
                    for ($i = 0; $i < 14; $i++) {
                        $csrf .= $characters[rand(0, $charactersLength - 1)];
                    }
                ?>
                <h2>Update contact email address</h2>
                <p>Current user: <?php echo $username; ?></p>
                <p>Email address: <?php echo $email; ?></p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="mb-3 form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                            placeholder="Enter email">
                    </div>
                    <input type="text" name="csrf" id="csrf" value="<?php echo $csrf; ?>" hidden>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <hr />
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="text" name="logout" class="form-control" id="logout" hidden>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </div>
                </form>
                <?php } else { ?>
                <h2>Sign in</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="mb-3 form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username"
                            aria-describedby="emailHelp" placeholder="Enter username">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </main>

  
</body>

</html>