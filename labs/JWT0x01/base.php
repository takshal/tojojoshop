<html>
<body>
<xmp>
<?php

require_once __DIR__ . '/common.php';

if (!isset($jwtImpl)) {
    die();
}

$token = getToken();

if ($token) {
    try {
        printValidJwt($jwtImpl->decodeJwt($token));
    } catch (Exception $e) {
        printInvalidJwt($e);
    }
} else {
    $jwt = $jwtImpl->encodeJwt(createTokenObject());
    echo "JWT: $jwt\n";
}
?>
</xmp>

