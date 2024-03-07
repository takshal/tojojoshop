<?php
require '../db.php';
// ini_set("display_errors", 0);

$status = 0;
$message = "";
$complete = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["otp"]) && isset($_POST["username2"])) {
        // check if the mfa code is correct
        $otp = $_POST["otp"];
        $username = $_POST["username2"];
        $sql = "SELECT otp FROM at0x01 WHERE username = '$username'";
        $result = $conn->query($sql);
        $otp_check = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['otp'] == $otp) {
                    $message = "You have successfully completed the signup process!";
                    $status = 2;
                    $complete = 1;
                }
            }
        } else {
            echo "<p>Incorrect MFA code</p>";
        }
    } else {
        if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $otp = mt_rand(1000, 9999);
            $sql = "INSERT INTO at0x01 (username, password, email, OTP) VALUES ('$username', '$password', '$email', $otp)";
           
          
            if ($conn->query($sql) === TRUE) {
                $message = "You have successfully Sign Up!";
                $status = 1;
                $showAccountCreated = true;
            } else {
                $showFailedSignUp = true;
            }
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
        <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / Signup 0x01</h2>

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
            } elseif ($status == 0) { ?>
                <h2>Signup</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="mb-3 form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="test@test.com">
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
                        <input type="text" name="otp" class="form-control" id="mfa" placeholder="000000">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <input type="hidden" value="<?php echo $otp; ?>">
                </form>
            <?php } ?>

        </div>
    </div>
</main>

<script src="../assets/popper.min.js"></script>
<script src="../assets/bootstrap.min.js"></script>
</body>
</html>
