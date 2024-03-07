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
            <h2 class="pb-2 border-bottom"><a href="../index.php" class="text-decoration-none">Labs</a> / XSS 0x015</h2>
            
            <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
                <h2 class="pb-3">Create todo list</h2>
                <form>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="I went to learn hacking" aria-label="Todo item" id="commentInput">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" onclick="addComment()">Add</button>
                        </div>
                    </div>
                </form>

                <h3 class="pb-3">Your list:</h3>
                <div id="demo"></div>
            </div>
        </div>
    </main>
   
    <script>
        function addComment() {
            var comment = document.getElementById("commentInput").value;
            var currentList = document.getElementById("demo").innerHTML;
            document.getElementById("demo").innerHTML = currentList + "<p>" + comment + "</p>";
        }
    </script>
</body>
</html>
