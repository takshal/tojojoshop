<?php
require('../db.php');
ini_set("display_errors", 0);


                           
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
            <h2 class="pb-2 border-bottom"><a href="../index.php" class="text-decoration-none">Labs</a> / SQL 0x02</h2>
            
            <div class="p-5 mb-4 bg-light rounded-3" style="background-color: none !important; padding: 0 !important">
                <img src="../assets/2.jpg" style="width:100%">
            </div>
            <div class="p-5 mb-4 bg-dark rounded-3 text-light">
                <h2 class="pb-2">Entire licence number and check it is expire or not.</h2>
            </div>

            <div class="p-5 mb-4 my-color rounded-3">
                <?php 
        if (isset($_GET['lnumber'])) {
        $id = $_GET['lnumber'];
         $sql = "SELECT * FROM injection0x02 WHERE Lnum = '$id'";
                        $result = $conn->query($sql);
                         }?>
                <form action="" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="lnumber" class="form-control" placeholder="1234" aria-label="Username" value="">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Check</button>
                        </div>
                    </div>
                </form>
                <?php if ($result->num_rows > 0) { echo "Note Expire";}else{ echo "expire";} ?>
            </div>
            
        </div>
    </main>



</body>

</html>