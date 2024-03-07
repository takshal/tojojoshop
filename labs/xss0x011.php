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
            <h2 class="pb-2 border-bottom"><a href="../index.php" class="text-decoration-none">Labs</a> / XSS 0x011</h2>
            
            <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
                <h2 class="pb-3">Create todo list</h2>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="I went to learn hacking" aria-label="Username">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Add</button>
                        </div>
                    </div>
                </form>

                <h3 class="pb-3">Your list:</h3>
                <ul id="todolist"></ul>

            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>

    <script>
        document.querySelector("form").addEventListener("submit", function(event) {
            event.preventDefault();
            var input = document.querySelector("input[name='search']");
            var todoList = document.querySelector("#todolist");
            var newItem = document.createElement("li");
            newItem.textContent = input.value;
            todoList.appendChild(newItem);
            newItem.innerHTML = newItem.textContent;
            input.value = "";
        });
    </script>

</body>

</html>