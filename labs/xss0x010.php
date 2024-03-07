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
            <h2 class="pb-2 border-bottom"><a href="../index.php" class="text-decoration-none">Labs</a> / XSS 0x010</h2>
            
            <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
                <h2 class="pb-3">Search items in our tojojo shop</h2>
                <?php
                ini_set("display_errors", 0);
     if(isset($_GET['search'])) {
    $status =  $_GET['search'];

    $status = str_replace('<','&lt;', $status);
    $status = str_replace('>','&gt;', $status);

    
}
        ?> 

                <form action="" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Search Items" aria-label="Username" value="">                    
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
               
                <h3 class="pb-3">Your list:</h3>
                <ul id="todolist"> 
              <?php echo "No items found for <b>". urldecode($status) ?> </ul>


            </div>
        </div>
        <div class="modal" id="instructionsModal" tabindex="-1" aria-labelledby="instructionsLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="instructionsModalLabel">Instructions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h2>Where to begin</h2>
                        <p>Watch the videos from the course, they will guide you through the labs and let you know
                            which ones are challenges.</p>
                        <p>This course and these labs are primarily focussed on helping you build practical skills.
                            Of
                            course we will provide theory and support along the way but hands-on practice is the
                            only
                            way to get good at BugBounty and Web Application Penetration Testing.</p>
                        <p>You're encouraged to test out other tools and scanners too as you go along!</p>
                        <p>I also encorage you to try out attacks you've learned on different labs (e.g. many of
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