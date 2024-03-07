<?php
require '../db.php';
ini_set("display_errors", 0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $status = 0;

    if ($username == "tojojo" && $password == "hacker") {
        $message = "Please enter your MFA code";
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
<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <div class="row justify-content-end">
                <div class="col-auto">
                    <a href="/tojojoshop/instructions.php" class="btn btn-outline-secondary" data-bs-toggle="modal"
                        data-bs-target="#instructionsModal">Instructions</a>
                </div>
            </div>
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / Authentication 0x02</h2>

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

            <div class="p-5 mb-4 bg-light rounded-3">
                <h2>Your code</h2>
                <?php
                $sql = "SELECT mfa FROM auth0x02 WHERE username = 'tojojo'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<p>" . $row["mfa"] . "</p>";
                    }
                } else {
                    echo "<p>There was an error</p>";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
</body>

</html>