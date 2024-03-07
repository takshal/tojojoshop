<!DOCTYPE html>
<html>
<head>
    <title>tojojo shop Bug Bounty Labs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <header>
        
    </header>
    
    <main class="container px-4 py-5" id="custom-cards">
        <nav class="navbar navbar-expand-lg navbar-warning bg-warning">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Bug Bounty Labs</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="?page=home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=about.php">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=contact.php">Contact Us</a>
                        </li>
                        <!-- Add more menu items as needed -->
                    </ul>
                </div>
            </div>
        </nav>
        <br><h2 class="pb-2 border-bottom">LFI 0x01</h2>
        <!-- Your main content goes here -->
        
        <?php
        ini_set("display_errors", 0);
        // The page we wish to display
        $file = $_GET[ 'page' ];
        include( $file );
    ?>


    </main>

    <!-- Bootstrap JavaScript (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-l+UcDQJFZNqF90UuUksjgpxonD+03j1W6IKwTPTaF40C9BFHv34lL6oGrVGQ8Bb0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-yRK+o79E0sQb7l3uMsVd6ymxG44Xw+X8b9q2L2d0mL+q8oA5nFa9cF+NEUfYbQaC" crossorigin="anonymous"></script>
</body>
</html>
