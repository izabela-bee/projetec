<?php

$url = $_SERVER['REQUEST_URI'];


$url = explode('?', $url)[0];


$url = trim($url, '/');


$url = preg_replace('#^public/#', '', $url);

if ($url === '') {
    $url = 'inicial';
}

$page = __DIR__ . "/pages/$url.php";


if (file_exists($page)) {
    include_once $page;
}
