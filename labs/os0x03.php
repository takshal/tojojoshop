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
        <div class="container py-5">
            <div class="row justify-content-end">
                <div class="col-auto">
                    <a href="/tojojoshop/instructions.php" class="btn btn-outline-secondary" data-bs-toggle="modal"
                        data-bs-target="#instructionsModal">Instructions</a>
                </div>
            </div>
            <h2 class="pb-2 border-bottom"><a href="../index.php" class="text-decoration-none">Labs</a> / OS 0x03</h2>
            
            <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
                <h2 class="pb-3">Host to IP Converter && host availability check</h2>
                <form action="" method="GET">
                    <div class="mb-3">
                        <label for="searchInput" class="form-label visually-hidden">Search items</label>
                        <div class="input-group">
                            <input type="text" id="searchInput" name="search" class="form-control" placeholder="Enter Items" aria-label="Search items" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>
               
                <!-- <h3 class="pb-3">Your list:</h3> -->
                <ul id="todolist">
                    <?php
                    $message=0;
                        ini_set("display_errors", 0);
                        $str = $_GET["search"];
                        $target = $_REQUEST[ 'search' ];
                        $substitutions = array(
                                '&&' => '',
                                ';'  => '',
                                '| '  => '',
                            );  

                        $target = str_replace( array_keys( $substitutions ), $substitutions, $target );
                         if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
                            // Windows
                            $cmd =  shell_exec("ping  " . $target);
                              $message= $cmd;
                        }
                        else {
                            // *nix
                            $cmd = shell_exec( 'ping  -c 4 ' . $target );
                            $message= $cmd;
                        }

                       if (empty($target)) {
                           $message="";
                       }
                        // Feedback for the end user

                       echo $message;
                        echo "<pre>{$cmd}</pre>";
                    ?>
                </ul>
            </div>
        </div>

        <div class="modal fade" id="instructionsModal" tabindex="-1" aria-labelledby="instructionsLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="instructionsModalLabel">Instructions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h2>Where to begin</h2>
                        <p>Watch the videos from the course, they will guide you through the labs and let you know
                            which ones are challenges.</p>
                        <p>This course and these labs are primarily focused on helping you build practical skills.
                            Of
                            course we will provide theory and support along the way but hands-on practice is the
                            only
                            way to get good at BugBounty and Web Application Penetration Testing.</p>
                        <p>You're encouraged to test out other tools and scanners too as you go along!</p>
                        <p>I also encourage you to try out attacks you've learned on different labs (e.g. many of
                            them
                            are vulnerable to XSS, not just the XSS ones)</p>
                        <p>To reset the lab databases, visit /init.php</p>
                        <p>If you have issues, ping us a message on discord!</p>
                        <hr>
                        <p>Good luck!</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
