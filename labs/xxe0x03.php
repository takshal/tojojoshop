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
        <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / XXE 0x03</h2>
        <div class="p-5 mb-4 bg-light rounded-3" style="background-color: none !important; padding: 0 !important">
                <img src="../assets/2.jpg" style="width:100%">
            </div>
        <?php
        // Check if XML file is uploaded
        if ($_FILES && $_FILES['xml_file']['error'] == UPLOAD_ERR_OK) {
            $xml_content = file_get_contents($_FILES['xml_file']['tmp_name']);
            libxml_disable_entity_loader(false); // Enable loading of external entities
            
            $dom = new DOMDocument();
            $dom->loadXML($xml_content, LIBXML_NOENT | LIBXML_DTDLOAD); // Load XML with DTD loading enabled

            // No direct feedback to the user
            echo "<p class='alert alert-success'>XML file uploaded and processed.</p>";
        }
        ?>
        <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
            <form method="POST" enctype="multipart/form-data">
                <label for="xml_file">Upload XML file:</label>
                <input type="file" id="xml_file" name="xml_file">
                <input type="submit" value="Upload" class="btn btn-primary">
            </form>
        </div>
    </div>
</main>
</body>
</html>
