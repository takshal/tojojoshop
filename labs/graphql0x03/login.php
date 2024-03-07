<?php
require 'vendor/autoload.php';

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use GraphQL\GraphQL;

// Database connection
require 'db.php';

// GraphQL types
$userType = new ObjectType([
    'name' => 'User',
    'fields' => [
        'id' => Type::id(),
        'username' => Type::string(),
       
    ]
]);

$queryType = new ObjectType([
    'name' => 'Query',
    'fields' => [
        'login' => [
            'type' => $userType,
            'args' => [
                'username' => Type::string(),
                'password' => Type::string()
            ],
            'resolve' => function ($root, $args) use ($conn) {
                $username = $args['username'];
                $password = $args['password'];
                
                // Execute a query to check if the user exists and the password is correct
                $result = $conn->query("SELECT * FROM graph0x01 WHERE username = '$username' AND password = '$password'");
                // print_r($result->num_rows);
                // exit();
                if ($result->num_rows > 0) {
                    return $result->fetch_assoc();
                } else {
                    return null;
                }
            }
        ]
    ]
]);

$schema = new Schema([
    'query' => $queryType
]);

$input = file_get_contents('php://input');
if ($input) {
    $inputData = json_decode($input, true);
    $query = $inputData['query'];
    $result = GraphQL::executeQuery($schema, $query);
    $output = $result->toArray();
    header('Content-Type: application/json');
    echo json_encode($output);
}
?>
