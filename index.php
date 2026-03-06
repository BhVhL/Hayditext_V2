<?php

include 'vendor/autoload.php';
include 'env.php';

session_start();

$ulr = parse_url($_SERVER['REQUEST_URI']);
$path = isset($ulr['path']) ? $ulr['path'] : '/';

use App\Controller\ProjectController;
use App\Controller\HomeController;
$homeController = new HomeController();
$projectController = new ProjectController();

switch ($path) {
    case '/':
        $homeController->index();
        break;
    case '/projects/add':
        $projectController->addProject();
        break;
    default:
        http_response_code(404);
        echo "Page not found";
        break;
}