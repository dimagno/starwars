<?php
return [
    '/' => ['App\Controllers\HomeController', 'index'],         // Rota inicial
    '/starwars' => ['App\Controllers\HomeController', 'index'],  // Rota Star Wars
    '/starwars/sobre' => ['App\Controllers\HomeController', 'sobre'],  // Rota Sobre
    '/starwars/filmes'=> ['App\Controllers\HomeController','filmes'], //rota inicial de filmes
    '/starwars/ajax/filmes' => ['App\Controllers\FilmController','listAllFilms'],
    '/starwars/filme/{id}'=>['App\Controllers\FilmController', 'filmDetail'],
    
];
 ?>