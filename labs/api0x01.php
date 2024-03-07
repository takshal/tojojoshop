
<!DOCTYPE html>
<html>
<head>
    <title>tojojo shop Bug Bounty Labs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head><style> .my-color{background-color:#fff3cd}</style>
<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <div class="row justify-content-end">
                <div class="col-auto">
                    <a href="/tojojoshop/instructions.php" class="btn btn-outline-secondary" data-bs-toggle="modal"
                        data-bs-target="#instructionsModal">Instructions</a>
                </div>
            </div>
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / APIs 0x01</h2>

            <div class="p-5 mb-4 bg-light rounded-3">
                <h2>API Index</h2>
                <hr />
                <div class="command-block mb-3">
                    <p><strong>POST /login.php</strong></p>
                    <div class="row">
                        <pre
                            class="col-md-11">curl -X POST -H "Content-Type: application/json" -d '{username: "admin", password: "password123"}' http://localhost/labs/api/login.php</pre>
                        <div class="col-md-1">
                            <button class="btn btn-secondary btn-block" onclick="copyToClipboard(this)">Copy</button>
                        </div>
                    </div>
                </div>
                <div class="command-block mb-3">
                    <p><strong>GET /account.php</strong></p>
                    <div class="row">
                        <pre class="col-md-11">curl -X GET "http://localhost/labs/api/account.php?token=JWT"</pre>
                        <div class="col-md-1">
                            <button class="btn btn-secondary btn-block" onclick="copyToClipboard(this)">Copy</button>
                        </div>
                    </div>
                </div>
                <div class="command-block mb-3">
                    <p><strong>PUT /account.php</strong></p>
                    <div class="row">
                        <pre
                            class="col-md-11">curl -X PUT -H "Content-Type: application/json" -d '{token: "JWT", username:"username", bio: "New bio information."}' http://localhost/labs/api/account.php</pre>
                        <div class="col-md-1">
                            <button class="btn btn-secondary btn-block" onclick="copyToClipboard(this)">Copy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
    <script>
    function copyToClipboard(buttonElement) {
        const preElement = buttonElement.parentElement.previousElementSibling;

        const textarea = document.createElement("textarea");
        textarea.value = preElement.textContent;

        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand("copy");
        document.body.removeChild(textarea);
        console.log("See how I make life easy for you ;) You're welcome :D");
        buttonElement.textContent = "Copied!";
        buttonElement.classList.remove('btn-secondary');
        buttonElement.classList.add('btn-success');

        setTimeout(() => {
            buttonElement.textContent = "Copy";
            buttonElement.classList.remove('btn-success');
            buttonElement.classList.add('btn-secondary');
        }, 1500);
    }
    </script>
</body>

</html>