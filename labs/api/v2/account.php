<?php

header('Content-Type: application/json');
require '../../../db.php';

$jwt = $_COOKIE['session'] ?? null;
$user = $_SERVER['REQUEST_METHOD'] === 'PUT' ? (json_decode(file_get_contents("php://input"), true)['username'] ?? null) : ($_GET['username'] ?? null);

if ($jwt) {
    list($header, $payload, $signature) = explode('.', $jwt);
    $decoded_payload = json_decode(base64_decode($payload), true);
    $username = $decoded_payload['user'];

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $stmt = $conn->prepare("SELECT username, role, bio FROM api0x01 WHERE username = ?");
        $stmt->bind_param("s", $username);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows === 1) {
                echo json_encode($result->fetch_assoc());
            } else {
                echo json_encode(['status' => 'error', 'message' => 'User not found']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'PUT' && $user) {
        $bio = json_decode(file_get_contents("php://input"), true)['bio'] ?? null;

        if ($bio) {
            $stmt = $conn->prepare("UPDATE api0x01 SET bio = ? WHERE username = ?");
            $stmt->bind_param("ss", $bio, $user);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Bio updated successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Database error']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Bio data missing']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Token missing']);
}
