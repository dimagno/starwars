<?php

require_once '../bootstrap.php';

$url = $_SERVER['REQUEST_URI'];
$routes = include '../routes/web.php';

if (array_key_exists($url, $routes)) {
    [$controller, $method] = explode('@', $routes[$url]);
    $controller = "App\\Controllers\\$controller";
    (new $controller())->$method();
} else {
    http_response_code(404);
    echo "Página não encontrada.";
}
?>