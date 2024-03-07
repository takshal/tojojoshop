<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Redirect to the login page if not authenticated
    header('Location: login.php');
    
}

// Display protected content
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
            <h2 class="pb-2 border-bottom"><a href="../index.php" class="text-decoration-none">Labs</a> / Authentication 0x05</h2>

            <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
                <div class="row">
                    <div class="col">
                        <img src="../../assets/tlogo.jpg" style="max-width: 575px">
                    </div>
                    <div class="col">
                        <h2>Welcome to the admin area!</h2>
                        <p>This is a protected area accessible only to authenticated users.</p>
                        <p>Here, you can manage important resources and settings.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>


</body>

</html>
