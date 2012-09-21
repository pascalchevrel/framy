<?php

$url  = parse_url($_SERVER['REQUEST_URI']);
$file = pathinfo($url['path']);

// Only process .php files and forbid direct access to router file
if ((isset($file['extension']) && $file['extension'] != 'php') || $url['path'] == '/init.php') {
    return false;
}

unset($url, $file);

// We can now use a controller and dispatch urls
