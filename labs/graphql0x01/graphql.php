<?php
require 'vendor/autoload.php';

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use GraphQL\GraphQL;

require 'db.php'; // Database connection

$bookType = new ObjectType([
    'name' => 'Book',
    'fields' => [
        'id' => Type::id(),
        'title' => Type::string(),
        'author' => Type::string(),
    ]
]);

$queryType = new ObjectType([
    'name' => 'Query',
    'fields' => [
        'books' => [
            'type' => Type::listOf($bookType),
            'resolve' => function () use ($conn) {
                $result = $conn->query("SELECT * FROM books");
                return $result->fetch_all(MYSQLI_ASSOC);
            }
        ]
    ]
]);

$mutationType = new ObjectType([
    'name' => 'Mutation',
    'fields' => [
        'addBook' => [
            'type' => $bookType,
            'args' => [
                'title' => Type::nonNull(Type::string()),
                'author' => Type::nonNull(Type::string())
            ],
            'resolve' => function ($root, $args) use ($conn) {
                $title = $conn->real_escape_string($args['title']);
                $author = $conn->real_escape_string($args['author']);
                $conn->query("INSERT INTO books (title, author) VALUES ('$title', '$author')");
                $id = $conn->insert_id;
                return ['id' => $id, 'title' => $args['title'], 'author' => $args['author']];
            }
        ]
    ]
]);

$schema = new Schema([
    'query' => $queryType,
    'mutation' => $mutationType
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
