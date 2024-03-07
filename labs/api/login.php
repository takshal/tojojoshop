<?php

header('Content-Type: application/json');
require '../../db.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['username']) && isset($data['password'])) {
    $username = $data['username'];
    $password = $data['password'];

    $stmt = $conn->prepare("SELECT username, role FROM api0x01 WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            $header = base64_encode('{"alg":"none","typ":"JWT"}');
            $payload = base64_encode('{"user":"' . $user['username'] . '","role":"' . $user['role'] . '"}');
            $jwt = "$header.$payload.";

            echo json_encode(['status' => 'success', 'token' => $jwt]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Required fields missing']);
}
