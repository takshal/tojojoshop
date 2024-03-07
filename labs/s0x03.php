<?php
// Function to resize image using a third-party API (simulated)
function resizeImage($imageUrl) {
     $imageContent = file_get_contents($imageUrl);
    return $imageContent;
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imageUrl = $_POST['image_url'];
    $width = $_POST['width'];
    $height = $_POST['height'];

    // Resize image (insecurely)
    $result = resizeImage($imageUrl);

    // Display result
    echo "<p>$result</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tojojo shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head> <style>
        .my-color {
            background-color: #fff3cd
        }
    </style>
<body>
   <div class="container px-4 py-5" id="custom-cards">
    <div class="row justify-content-end">
                <div class="col-auto">
                    <a href="/tojojoshop/instructions.php" class="btn btn-outline-secondary" data-bs-toggle="modal"
                        data-bs-target="#instructionsModal">Instructions</a>
                </div>
            </div>
        <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / SSRF 0x03</h2>

        <div class="p-5 mb-4 my-color rounded-3">

        <h2 class="pb-3">Image Resizing Service</h2>
        <div class="row">
            <div class="col-md-6">
                <form method="post">
                    <div class="mb-3">
                        <label for="image_url" class="form-label">Image URL:</label>
                        <input type="text" id="image_url" name="image_url" class="form-control" value="http://example.com/image.jpg">
                    </div>
                    <div class="mb-3">
                        <label for="width" class="form-label">Width:</label>
                        <input type="number" id="width" name="width" class="form-control" value="100">
                    </div>
                    <div class="mb-3">
                        <label for="height" class="form-label">Height:</label>
                        <input type="number" id="height" name="height" class="form-control" value="100">
                    </div>
                    <button type="submit" class="btn btn-primary">Resize Image</button>
                </form>
            </div>
            <div class="col-md-6">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    echo "<h3 class='mt-5'>Result:</h3>";
                    echo "<p>" . htmlspecialchars($result) . "</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
