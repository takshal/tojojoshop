<?php
// Vulnerable SSRF endpoint
function fetchImage($url) {
    // No validation or sanitization (vulnerable to SSRF)
    $imageContent = file_get_contents($url);
    return $imageContent;
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $imageURL = $_POST['image_url']; // Input field vulnerable to SSRF

    // Create blog post (insecurely)
    $post = array(
        'title' => $title,
        'content' => $content,
        'image' => fetchImage($imageURL) // Vulnerable SSRF call
    );

    // Save blog post to database (not shown)
    // ...
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tojojo shop Bug Bounty Labs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .my-color {
            background-color: #fff3cd
        }
    </style>
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
        <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / SSRF 0x02</h2>

        <div class="p-5 mb-4 my-color rounded-3">
            <h2>Create Blog Post</h2>
            <form method="post">
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title" class="form-control"><br>
                <label for="content">Content:</label><br>
                <textarea id="content" name="content" class="form-control"></textarea><br>
                <label for="image_url">Image URL:</label><br>
                <input type="text" id="image_url" name="image_url" class="form-control"><br><br>
                <input type="submit" value="Create Post" class="btn btn-danger">
            </form>
        </div>
    </div>
</main>

<script src="../assets/popper.min.js"></script>
<script src="../assets/bootstrap.min.js"></script>
</body>

</html>
