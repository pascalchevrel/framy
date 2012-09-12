<?php

// We separate path and query string for the dispatcher
$path  = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

// Don't allow direct access to the file
if ($path == '/init.php') {
    die('No direct access');
}

// Don't process non-PHP files
$file_ext = pathinfo($path);
if ($file_ext['extension'] != 'php' && $file_ext['extension'] != null) {
    return false;
}

// We can now use a controller and dispatch urls
