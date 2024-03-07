<!DOCTYPE html>
<html>
<head>
    <title>tojojo shop Bug Bounty Labs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head><style> .my-color{background-color:#fff3cd}</style>
<body>
    <main>
        <div class="container py-5">
            <div class="row justify-content-end">
                <div class="col-auto">
                    <a href="/tojojoshop/instructions.php" class="btn btn-outline-secondary" data-bs-toggle="modal"
                        data-bs-target="#instructionsModal">Instructions</a>
                </div>
            </div>
            <h2 class="pb-2 border-bottom"><a href="../index.php" class="text-decoration-none">Labs</a> / Graphql 0x02</h2>
            
        <div class="alert alert-info" role="alert">
                <p class="no-margin">Login As Admin</p>
               
            </div>

    <div class="login-container">
        <div class="p-5 mb-4 my-color rounded-3 shadow-sm p-3 mb-5 rounded">
        <h2 class="text-center mb-4">Login</h2>
        <form id="login-form">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
    </div>
</div>
    <!-- Bootstrap JS (optional, for Bootstrap components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-07f8fF1BR4pIn7utKTtrHh+L2++7UdPEI3z+1pe3SiVviqH5S8kNqcBzPWl+0iEz" crossorigin="anonymous"></script>
    <!-- Login script (GraphQL query submission) -->
    <script>
        document.getElementById('login-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            // Construct the GraphQL query with proper escaping
            const query = `
                query {
                    login(username: "${escapeGraphQLString(username)}", password: "${escapeGraphQLString(password)}") {
                        id
                        username
                        
                    }
                }
            `;

            // Send the GraphQL query to the server (login.php)
            fetch('login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ query })
            })
            .then(response => response.json())
            .then(data => {
                if (data && data.data && data.data.login) {
                    // Login successful, redirect or perform other actions
                    console.log('Login successful:', data.data.login);
                    alert('Login successful:');
                    // Example: Redirect to dashboard page
                    // window.location.href = 'dashboard.html';
                } else {
                    // Login failed, display error message
                    console.error('Login failed');
                    // Example: Show error message
                    alert('Login failed. Please check your username and password.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Example: Show error message
                alert('An error occurred while processing your request. Please try again later.');
            });
        });

        // Function to escape special characters in a GraphQL string
        function escapeGraphQLString(str) {
            return str.replace(/\\/g, '\\\\').replace(/"/g, '\\"');
        }
    </script>
</body>
</html>
