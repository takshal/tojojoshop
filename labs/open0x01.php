<!DOCTYPE html>
<html>
<head>
    <title>tojojo shop Bug Bounty Labs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style> .my-color{background-color:#fff3cd}</style>
</head>
<body>
    <main>
        <div class="container py-5">
            <div class="row justify-content-end">
                <div class="col-auto">
                    <a href="/tojojoshop/instructions.php" class="btn btn-outline-secondary" data-bs-toggle="modal"
                        data-bs-target="#instructionsModal">Instructions</a>
                </div>
            </div>
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / OPEN 0x01</h2>

            
    <title>tojojo shop Bug Bounty Labs</title>
    
</head>
<body>
    <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
        <h1>Welcome to our tojojo shop website!</h1>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <form action="" method="GET">
            <div class="mb-3 form-group">
            <input type="text" class="form-control" name="redirect" placeholder="Enter URL">
            
            </div>
            <div class="mb-3 form-group"><input type="submit" value="Redirect" class="btn btn-primary"></div>
        </form>
        <p>Not sure what open redirect vulnerabilities are? Learn more <a href="https://www.owasp.org/index.php/Open_redirect" target="_blank">here</a>.</p>
    </div>
</body>
</html>
<?php
if (isset($_GET['redirect'])) {
    $redirect_url = $_GET['redirect'];
    
    header("Location: $redirect_url");
    exit();
} 

?>
