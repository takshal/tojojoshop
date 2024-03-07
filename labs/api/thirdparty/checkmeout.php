<?php

header('Content-Type: application/json');
$price = rand(1000, 2000) / 100;
echo json_encode(['price' => $price]);