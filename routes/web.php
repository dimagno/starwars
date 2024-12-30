<?php
return [
    '/' => ['App\Controllers\HomeController', 'index'],      // Rota para Home
    '/sobre' => ['App\Controllers\SobreController', 'mostrar'], // Rota para Sobre
    '/starwars' => ['App\Controllers\HomeController', 'index'], // Rota para StarWars
    '/teste' => ['App\Controllers\TesteController', 'mostrar'] // Rota para Teste (se for necessário)
];