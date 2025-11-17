<?php
include "./env.php";
include "./vendor/autoload.php";
$url = parse_url($_SERVER['REQUEST_URI']);
$path = $url['path'] ?? '/';
session_start();

use App\Controller\HomeController;

$homeController = new HomeController();

switch (substr($path, strlen(BASE_URL))) {
    case "/":
        $homeController->home();
        break;
    default:
        $homeController->home();
        break;
}

