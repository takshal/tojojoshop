<?php
session_start();
require '../../db.php';
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: login.php');
    exit();
}



$user_id = base64_decode($_COOKIE['user_id']); // Decode base64 user ID from cookie
$sql = "SELECT * FROM auth0x05 WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $email = $row['email'];
} else {
    $username = "N/A";
    $email = "N/A";
}
$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>tojojo shop - Profile</title>
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
            </div>
            <h2 class="pb-2 border-bottom"><a href="../index.php" class="text-decoration-none">Labs</a> / AUTH 0x07</h2>
            

            <div class="alert alert-success" role="alert">
                <p class="no-margin">Welcome, <?php echo $username; ?>!</p>
                <p class="no-margin">Your User ID: <?php echo $user_id; ?></p>
                <p class="no-margin">Email: <?php echo $email; ?></p>
            </div>

            <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
                <div class="row">
                    <div class="col">
                        <h2>Welcome to the Dashboard</h2>
                        <p>This is your dashboard. You can view your personal information here.</p>
                        
                        <p><a href="logout.php">Logout</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>


</body>
</html>
