<!DOCTYPE html>
<html>
<head>
    <title>tojojo shop Bug Bounty Labs</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<style> .my-color{background-color:#fff3cd}</style>
<body>
    <main>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / Open Redirect 0x01</h2>

            <div class="p-5 mb-4 bg-light rounded-3">
                <h2>Code snippets</h2>
                <hr />
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button onclick="window.location.href='./r0x01_script.php?id=1&return_url=./open0x02.php'"
                            class="btn btn-primary">View Script</button>
                        Script 1 / SQL injection payloads
                    </div>
                    <div class="col-md-12 mb-4">
                        <button onclick="window.location.href='./r0x01_script.php?id=2&return_url=./open0x02.php'"
                            class="btn btn-primary">View Script</button>
                        Script 2 / XSS Payloads
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
</body>

</html>