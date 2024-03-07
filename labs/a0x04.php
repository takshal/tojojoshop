<?php
require '../db.php';
ini_set("display_errors", 0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $status = 0;

    // Vulnerable SQL query susceptible to SQL injection
    $query = "SELECT * FROM auth0x03 WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // User found, authentication successful
        $row = $result->fetch_assoc();
        $message = 'Successfully logged in! Challenge complete!';
        $status = 1;
    } else {
        // No user found, authentication failed
        $message = 'Invalid username or password!';
        $status = 2;
    }
    $conn->close();
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
            <h2 class="pb-2 border-bottom"><a href="../index.php" class="text-decoration-none">Labs</a> / Authentication 0x04</h2>
            

            <?php
            if ($status == 2) {
                echo '<div class="alert alert-danger" role="danger"><p class="no-margin">' . $message . '</p></div>';
            } elseif ($status == 1) {
                echo '<div class="alert alert-success" role="success"><p class="no-margin">' . $message . '</p></div>';
            }
            ?>

            <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
                <div class="row">
                    <div class="col">
                        <img src="../assets/tlogo.jpg" style="max-width: 575px">
                    </div>
                    <div class="col">
                        <h2>Welcome to the tojojo shop</h2>
                        <p>Welcome to our online tea shop! As passionate purveyors of tea, we've traversed the lush,
                            fragrant tea gardens of the world to bring you an outstanding collection of the finest teas.
                        </p>
                        <p>
                            From the robust flavors of traditional black teas to the subtle complexities of rare white
                            teas, and from the exotic allure of our blooming teas to the soothing charm of our herbal
                            blends, we offer a symphony of tastes sure to delight every tea lover. Step into our store,
                            and let the journey of discovery and enjoyment begin. </p>
                        <p>Immerse yourself in the world of tea!
                        </p>
                        <h2>Login</h2>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="mb-3 form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username"
                                    aria-describedby="emailHelp" placeholder="Enter username">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Enter password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-danger"
                                    >Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>


</body>

</html>
