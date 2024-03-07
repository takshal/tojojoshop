<?php
// User class representing user profiles
class User {
    public $username;
    public $isAdmin = false;

    public function __construct($username) {
        $this->username = $username;
    }

    public function __toString() {
        return $this->username . ($this->isAdmin ? ' (Admin)' : '');
    }
}

// Function to unserialize user data from cookie
function unserializeUserData($data) {
    return unserialize(base64_decode($data));
}

// Process login
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Simulate user authentication (you would replace this with actual authentication logic)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simulate user retrieval from a database
    $user = new User($username);
    $user->isAdmin = ($username === 'admin' && $password === 'password');

    // Serialize and encode user data
    $serializedUserData = base64_encode(serialize($user));

    // Set the cookie with serialized user data
    setcookie('userdata', $serializedUserData, time() + 3600, '/'); // Cookie expires in 1 hour
    header("Location: profile.php");
    exit();
}

// Process logout
if (isset($_GET['logout'])) {
    // Clear the userdata cookie
    setcookie('userdata', '', time() - 3600, '/'); // Expire cookie
    header("Location: index.php");
    exit();
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
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / Deserialize 0x01</h2>
            <div class="p-5 mb-4 my-color rounded-3">

    <?php if (!isset($_COOKIE['userdata'])) {
        
    ?>
    <h2>Login</h2>
    <form method="post">
        <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<?php } ?>
</body>
</html>
