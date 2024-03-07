<?php
require('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con2 = strip_tags($_POST['comment'], '<spam> <div>');
    
    $stmt = $conn->prepare("INSERT INTO xss0x03 (name, comment) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $comment);
    
    $name = 'hacker';
    $comment = $con2;
    $stmt->execute();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['action'])) {
        $stmt = $conn->prepare("DELETE FROM xss0x03");
        $stmt->execute();
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
        <div class="container px-4 py-5" id="custom-cards">
                <div class="row justify-content-end">
                <div class="col-auto">
                    <a href="/tojojoshop/instructions.php" class="btn btn-outline-secondary" data-bs-toggle="modal"
                        data-bs-target="#instructionsModal">Instructions</a>
                </div>
            </div>
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / XSS 0x013</h2>

            <div class="p-5 mb-4 bg-dark rounded-3 text-light shadow-sm p-3 mb-5 rounded">
                <h2 class="pb-3">this is tojojo blog</h2>
            </div>

            <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
                <h3 class="pb-3">What is your crazy idea that might just work?</h3>

                <?php
                $sql = "SELECT * FROM xss0x03";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<hr>';
                        echo "<p style='font-weight:bold'>" . $row["comment"] . "</p>";
                        echo "<p>Posted by: " . $row["name"] . "</p>";
                    }
                } else {
                    echo "<p>No comments found</p>";
                }
                $conn->close();
                ?>
            </div>
            <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
                <h3 class="pb-3">Add a comment</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="comment" class="form-control" placeholder="Let's hack together !!!!!" aria-label="Username">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    

</body>

</html>