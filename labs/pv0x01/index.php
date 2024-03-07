<?php

require('../../db.php');
session_start();

$msg=0;
if(isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO pe0x01 (username, password, is_admin) VALUES (?, ?, 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    
    if ($stmt->execute()) {
        echo "User registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM pe0x01 WHERE username=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = $row['is_admin'];
        // echo "Login successful. Welcome, $username!";
    } else {
        echo "Invalid username or password.";
    }
}

if(isset($_POST['submit_note'])) {
    $chat = $_POST['note'];
    $username = $_SESSION['username'];

    $sql = "INSERT INTO chats0x01 (username, chat, approved) VALUES (?, ?, 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $chat);
    
    if ($stmt->execute()) {
        $msg= "Note submitted successfully. Waiting for approval.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
if(isset($_GET['approve'])) {
        $chat_id = $_GET['approve'];
        
        $sql = "UPDATE chats0x01 SET approved=1 WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $chat_id);
        
        if ($stmt->execute()) {
            $msg = "Note approved successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
   
}

if(isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

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
            <h2 class="pb-2 border-bottom"><a href="../index.php" class="text-decoration-none">Labs</a> / Privilege 0x01</h2>
            <div class="alert alert-info" role="alert">
                <p class="no-margin">Admin account: tojojo:tojojo</p>
                
            </div>
            
            <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
    <?php if(isset($_SESSION['username'])): ?>
        <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
        <?php if (isset($msg)) {
        	echo $msg;
        } ?>
        <form action="" method="post">
            <textarea name="note" rows="4" cols="50" class="form-control"></textarea><br>
            <input type="submit" name="submit_note" value="Submit Notes" class="btn btn-danger">
        </form><br>
        <h2>Notes</h2>
    <?php
    $sql = "SELECT * FROM chats0x01 WHERE approved=1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "User: " . $row['username'] . "<br>";
            echo "Notes: " . $row['chat'] . "<br>";
            echo "<hr>";
        }
    } else {
        echo "No approved chats.";
    }
    ?>

        <form action="" method="post">
            <input type="submit" name="logout" value="Logout" class="btn btn-danger">
        </form>
    <?php else: ?>
        <h2>Sign Up</h2>
        <form action="" method="post">
        	<div class="mb-3">
                        <label for="searchInput" class="form-label visually-hidden">Username</label>
                        <div class="input-group">
            Username: <input type="text" name="username" class="form-control">
        </div></div>
        <div class="mb-3">
                        <label for="searchInput" class="form-label visually-hidden">Password</label>
                        <div class="input-group">
            Password: <input type="password" name="password" class="form-control">
        </div></div>
            <input type="submit" name="signup" value="Sign Up" class="btn btn-danger">
        </form><br><hr><br>
        <h2>Login</h2>
        <form action="" method="post">
        	<div class="mb-3">
                        <label for="searchInput" class="form-label visually-hidden">Username</label>
                        <div class="input-group">
            Username: <input type="text" name="username" class="form-control"></div></div>
            <div class="mb-3">
                        <label for="searchInput" class="form-label visually-hidden">Password</label>
                        <div class="input-group">
            Password: <input type="password" name="password" class="form-control"></div></div>
            <input type="submit" name="login" value="Login" class="btn btn-danger">
        </form>
    <?php endif; ?>
    
    

    <?php
    if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
        echo "<h2>Unapproved Chats (Admin Only)</h2>";
        $sql = "SELECT * FROM chats0x01 WHERE approved=0";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "User: " . $row['username'] . "<br>";
                echo "Chat: " . $row['chat'] . "<br>";
                echo "<a href='?approve=" . $row['id'] . "'>Approve Chat</a>";
                echo "<hr>";
            }
        } else {
            echo "No unapproved chats.";
        }
    }
    ?>
</body>
</html>