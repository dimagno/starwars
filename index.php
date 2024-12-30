<?php

require_once 'bootstrap.php';
function my_autoloader($class) {
    // Converte o namespace em caminho para o arquivo
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);  // Substitui \ por /
    
    // Caminho base para as classes
    $baseDir = __DIR__ . '/';  // O __DIR__ dá o diretório atual (onde o index.php está)

    // O nome do arquivo a ser incluído
    $file = $baseDir . $class . '.php';

    // Inclui o arquivo se existir
    if (file_exists($file)) {
        require_once $file;
    }
}

// Registra a função de autoload
spl_autoload_register('my_autoloader');

// Obtém apenas o caminho da URL e remove a barra no final, se houver
$url = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Carrega as rotas definidas
$routes = include 'routes/web.php';
//var_dump(['url' => $url, 'routes' => $routes]);
// Verifica se a URL corresponde a uma rota definida
if (array_key_exists($url, $routes)) {
    // Desestrutura o valor da rota: controlador e método
    [$controller, $method] = $routes[$url];
    
    // Cria uma instância do controlador
    $controllerInstance = new $controller();
    
    // Chama o método correspondente
    $controllerInstance->$method();
} else {
    // Se não encontrar a rota, retorna erro 404
    http_response_code(404);
    echo "Página não encontrada.";
}
