<?php

/*
 * Note: 
 * We use temporary variables that we later unset only for compatibility with PHP 5.3
 * in PHP 5.4+ we could use direcly returned array values from the function, /ex:
 * parse_url($_SERVER['REQUEST_URI'])['path']
 *
 */

$url  = parse_url($_SERVER['REQUEST_URI']);
$file = pathinfo($url['path']);

// Only process .php files and forbid direct access to router file
if ((isset($file['extension']) && $file['extension'] != 'php') || $url['path'] == '/init.php') {
    return false;
}

unset($url, $file);

// We can now use a controller and dispatch urls
