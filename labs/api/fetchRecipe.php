<?php

$directoryPath = '../files/';
function sanitizeInput($input)
{
    $patterns = [
        '/\.\.\//',
        '/http/',
    ];
    return preg_replace($patterns, '', $input);
}

if (isset($_GET['filename'])) {
    $filename = $_GET['filename'];
    $filename = sanitizeInput($filename);
    $filename = $directoryPath . $filename;
    echo file_get_contents($filename);
}
