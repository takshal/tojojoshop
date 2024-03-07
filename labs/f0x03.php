<?php
require '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["uploaded_file"]["name"]);
    $uploadOk = 1;

    // Check file type
    $fileType = mime_content_type($_FILES["uploaded_file"]["tmp_name"]);
    if ($fileType != 'image/png' && $fileType != 'image/jpeg') {
        echo "Only '.jpg' and '.png' files are allowed.";
        $uploadOk = 0;
    }

    // Check if file has a blacklisted extension
    $blacklisted_extensions = ['php', 'php2', 'php3', 'php4', 'aspx', 'exe', 'bat', 'html', 'htm', 'js'];
    $file_extension = pathinfo($_FILES["uploaded_file"]["name"], PATHINFO_EXTENSION);
    if (in_array($file_extension, $blacklisted_extensions)) {
        echo "The file extension '.{$file_extension}' is not allowed.";
        $uploadOk = 0;
    }

    // check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        echo $target_file;
        $uploadOk = 0;
    }

    // check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if all good, upload file
    } else {
        if (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["uploaded_file"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / Insecure file upload 0x03</h2>

            <div class="p-5 mb-4 my-color rounded-3">
                <h2>Choose a file</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control" type="file" id="formFile" name="uploaded_file" onchange="validateFileInput(this);">
                    </div>
                    <div class="mb-3">
                        <button class=" btn btn-outline-secondary" type="submit">Upload</button>
                    </div>
                </form>

                <hr>

                <div>
                    <h2>Uploaded files:</h2>
                    <?php
                    $dir = "./uploads/";
                    if (is_dir($dir)) {
                        $files = scandir($dir);
                        $files = array_diff($files, array('.', '..'));
                        foreach ($files as $file) {
                            echo $file . "<br>";
                        }
                    } else {
                        echo "Directory $dir does not exist.";
                    }
                    ?>
                </div>

            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>

    <script>
        function validateFileInput(input) {
            var validExtensions = ['jpg', 'png'];
            var fileName = input.files[0].name;
            var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
            if (!validExtensions.includes(fileNameExt.toLowerCase())) {
                input.value = '';
                alert("Only '.jpg' and '.png' files are allowed.");
            }
        }
    </script>

</body>

</html>
