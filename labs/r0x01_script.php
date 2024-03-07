<?php

$id = $_GET['id'];
$redirect_url = $_GET['return_url'];

$scriptText = "";
switch ($id) {
    case 1:
        $scriptText .= "<pre>' OR '1'='1</pre>";
        $scriptText .= "<pre>' OR 1=1--</pre>";
        $scriptText .= "<pre>' OR 1=1#</pre>";
        $scriptText .= "<pre>' UNION SELECT null, username, password FROM users#</pre>";
        $scriptText .= "<pre>' AND 1=2 UNION SELECT 'admin', 'password'--</pre>";
        break;
    case 2:
        $scriptText .= "<pre>&lt;script&gt;alert('XSS')&lt;/script&gt;</pre>";
        $scriptText .= "<pre>&lt;img src='x' onerror='alert(1)'&gt;</pre>";
        $scriptText .= "<pre>&lt;a href='javascript:alert(1)'&gt;Click me&lt;/a&gt;</pre>";
        $scriptText .= "<pre>&lt;body onload='alert(\"XSS\")'&gt;</pre>";
        $scriptText .= "<pre>&lt;input type='text' value='' onfocus='alert(1)'&gt;</pre>";
        break;
    default:
        $scriptText = "Unknown script ID.";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Open Redirect 0x01</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">

    </div>
    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
</body>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / Open Redirect 0x01</h2>

            <div class="p-5 mb-4 bg-light rounded-3">
                <h2>Code snippets</h2>
                <hr />
                <p><?php echo $scriptText; ?></p>
                <button onclick="window.location.href='<?php echo $redirect_url; ?>'" class="btn btn-secondary">Return
                    to
                    List</button>
            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
</body>

</html>