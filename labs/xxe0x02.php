<!DOCTYPE html>
<html>
<head>
    <title>tojojo shop Bug Bounty Labs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head><style> .my-color{background-color:#fff3cd}</style>
<style>
    
</style>
<body>
<main>
    <div class="container py-5">
           <div class="row justify-content-end">
                <div class="col-auto">
                    <a href="/tojojoshop/instructions.php" class="btn btn-outline-secondary" data-bs-toggle="modal"
                        data-bs-target="#instructionsModal">Instructions</a>
                </div>
            </div>

        <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / XXE 0x02</h2>
        <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
        <h1>Login</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="loginForm">
            <div class="mb-3 form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username">
            </div>
            <div class="mb-3 form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            
            <div class="mb-3">
                <button type="button" onclick="doLogin()" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <div class="msg"></div>

        </div>
    </div>
</main>

<script type='text/javascript'> 
function doLogin(){
    var username = $("#username").val();
    var password = $("#password").val();

    if(username == "" || password == ""){
        alert("Please enter the username and password!");
        return;
    }
    
    var data = "<user><username>" + username + "</username><password>" + password + "</password></user>"; 
    $.ajax({
        type: "POST",
        url: "doLogin.php",
        contentType: "application/xml;charset=utf-8",
        data: data,
        dataType: "xml",
        async: false,
        success: function (result) {
            var code = $(result).find("code").text();
            var msg = $(result).find("msg").text();
            if(code == "0"){
                $(".msg").text(msg + " login fail!");
            }else if(code == "1"){
                $(".msg").text(msg + " login success!");
            }else{
                $(".msg").text("error:" + msg);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            $(".msg").text(errorThrown + ':' + textStatus);
        }
    }); 
}
</script>
</body>
</html>
