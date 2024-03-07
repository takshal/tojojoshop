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
        <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / XXE 0x01</h2><br><br>
        <div class="p-5 mb-4 bg-light rounded-3" style="background-color: none !important; padding: 0 !important">
                <img src="../assets/3.png" style="width:100%">
            </div>
        <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
            <form method="POST" enctype="multipart/form-data">
                <label for="xml_file">Upload svg file:</label>
                <input type="file" id="xml_file" name="xml_file">
                <input type="submit" value="Upload">
            </form>
        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $xml_content = file_get_contents($_FILES['xml_file']['tmp_name']);
            libxml_disable_entity_loader(false); // Enable loading of external entities
            
            $dom = new DOMDocument();
            $dom->loadXML($xml_content, LIBXML_NOENT | LIBXML_DTDLOAD); // Load XML with DTD loading enabled

            // Output the content of the XML document
            echo "<br><h2>XML Content:</h2>";
            echo "<pre>" . htmlentities($dom->saveXML()) . "</pre>";
        }
        ?>
    </div>
</main>
</body>
</html>
