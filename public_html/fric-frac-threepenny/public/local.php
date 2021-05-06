<?php

//
//if (file_exists(__DIR__ . 'local.php/' . $_SERVER['REQUEST_URI'])) {
//    return false; // serve the requested resource as-is.
//} else {
//    include_once 'index.php';
//}


function cleanUpFileName($requestUri)
{
    $queryStart = strpos($requestUri, '?');
    if ($queryStart > 0) {
        $requestUri = substr($requestUri, 0, $queryStart);
    }
    return $requestUri;
}

$uri = $_SERVER['REQUEST_URI'];
$uri = cleanUpFileName($uri);
if (file_exists(__DIR__ . '/' . $uri)) {
    return false; // serve the requested resource as-is.
} else {
    include_once 'index.php';
}