<?php
require '../db.php';
ini_set("display_errors", 0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["mfa"]) && isset($_POST["username2"])) {
        // check if the mfa code is correct
        $mfa = $_POST["mfa"];
        $username = $_POST["username2"];
        $sql = "SELECT mfa FROM auth0x02";
        $result = $conn->query($sql);
        $mfa_check = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['mfa'] == $mfa) {
                    $message = "You have sucessfully logged in!";
                    $status = 1;
                    $complete = 1;
                }
            }
        } else {
            echo "<p>Incorrect MFA code</p>";
        }
    } else {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $status = 0;

        if ($username == "tojojo" && $password == "hacker") {
            $message = "Please enter your MFA code. Your code can be <a href='a0x02code.php' target='_blank'>found here</a>.";
            $status = 1;

            // generate a 6 digit code & insert it into the DB
            $code = mt_rand(100000, 999999);
            $stmt = $conn->prepare("UPDATE auth0x02 SET mfa = ? WHERE username = 'jessamy'");
            $stmt->bind_param("s", $mfa);
            $mfa = $code;
            $stmt->execute();
        } else {
            $message = "Your username or password was incorrect!";
            $status = 2;
        }
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
            <h2 class="pb-2 border-bottom"><a href="../index.php" class="text-decoration-none">Labs</a> / Authentication  0x02</h2>
            <div class="alert alert-info" role="alert">
                <p class="no-margin">Target account: tapori</p>
                <p class="no-margin">Your credentials: tojojo:hacker</p>
            </div>

            <?php
            if ($status == 2) {
                echo '<div class="alert alert-danger" role="danger"><p class="no-margin">' . $message . '</p></div>';
            } elseif ($status == 1) {
                echo '<div class="alert alert-success" role="success"><p class="no-margin">' . $message . '</p></div>';
            }
            ?>

            <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
                <?php if ($complete == 1) {
                    echo '<h2>Welcome ' . $username . '</h2>';
                } elseif ($status != 1) { ?>
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
                <?php } else { ?>
                    <h2>Enter your MFA code:</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="mb-3 form-group">
                            <label for="username2">Username</label>
                            <input type="text" value="<?php echo $username; ?>" name="username2" class="form-control" id="username2" readonly>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="password">MFA</label>
                            <input type="text" name="mfa" class="form-control" id="mfa" placeholder="000000">
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