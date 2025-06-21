<?php

use Core\Router;

const BASE_URL = __DIR__ . "/../";

require BASE_URL . "Core/functions.php";
require base_url("Core/Router.php");

$router = new Router();

require base_url("routes.php");

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (Throwable $th) {
    throw $th;
}
