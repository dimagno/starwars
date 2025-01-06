<?php
require_once 'bootstrap.php';
require "routes/web.php";

function my_autoloader($class) {
    // Converte o namespace em caminho para o arquivo
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);  // Substitui \ por /
    
    $baseDir = __DIR__ . '/';  // Caminho da raiz do projeto

    $file = $baseDir . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}

// Registra a função de autoload
spl_autoload_register('my_autoloader');

// Define o BASE_URL como a raiz
define('BASE_URL', '/');

// Obtém apenas o caminho da URL e remove a barra no final, se houver
$url = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Carrega as rotas definidas
$routes = include 'routes/web.php';

// Variável para verificar se a rota foi encontrada
$routeFound = false;

foreach ($routes as $route => $handler) {
    // Substitui {param} por uma expressão regular para capturar parâmetros
    $pattern = preg_replace('/\{[^\}]+\}/', '([^/]+)', $route);
    $pattern = str_replace('/', '\/', $pattern);

    if (preg_match("/^$pattern$/", $url, $matches)) {
        array_shift($matches); // Remove a correspondência completa da URL
        [$controller, $method] = $handler;
        
        $controllerInstance = new $controller();
        call_user_func_array([$controllerInstance, $method], $matches);

        $routeFound = true;
        break;
    }
}

if (!$routeFound) {
    // Se não encontrar a rota, retorna erro 404
    http_response_code(404);
    echo "Página não encontrada.";
}
