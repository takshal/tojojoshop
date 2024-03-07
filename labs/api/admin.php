<?php

if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1' && $_SERVER['REMOTE_ADDR'] !== '::1') {
    header('HTTP/1.1 403 Forbidden');
    echo "Access denied!";
    exit;
}

echo json_encode([
    'status' => 'success',
    'message' => 'Welcome to the admin endpoint!',
]);
