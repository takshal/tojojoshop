<?php

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['url'])) {
    echo json_encode(['status' => 'error', 'message' => 'URL not provided']);
    exit;
}

$url = $data['url'];
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

if ($response === false) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to fetch price from third-party']);
    exit;
}

$responseData = json_decode($response, true);
if (!isset($responseData['price'])) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data from third-party']);
    exit;
}

echo json_encode([
    'status' => 'success',
    'message' => 'Price fetched successfully!',
    'data' => [
        'price' => $responseData['price']
    ]
]);
