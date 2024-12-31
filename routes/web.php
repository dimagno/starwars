<?php
return [
    '/' => ['App\Controllers\HomeController', 'index'],         // Rota inicial
    '/starwars' => ['App\Controllers\HomeController', 'index'],  // Rota Star Wars
    '/starwars/sobre' => ['App\Controllers\HomeController', 'sobre'],  // Rota Sobre
];
 ?>