<?php
return [
    '/starwars' => ['App\Controllers\HomeController', 'index'],  // Rota Star Wars
    '/starwars/sobre' => ['App\Controllers\HomeController', 'sobre'],  // Rota Sobre
    '/starwars/filmes'=> ['App\Controllers\HomeController','filmes'], //rota inicial de filmes
    '/starwars/ajax/filmes' => ['App\Controllers\FilmController','listAllFilms'],
    '/starwars/filme/{id}'=>['App\Controllers\FilmController', 'filmDetail'],
    //Rotas para testes de retorno da API interna
    '/starwars/api/filmes'=>['App\Controllers\HomeController', 'getAllMovies'],
    '/starwars/api/filme/{id}'=>['App\Controllers\HomeController', 'getFilm'],
    // chamadas da api feita via ajax
    '/starwars/api/peoples' =>['App\Controllers\FilmController', 'getPeoples'],
    '/starwars/api/starships'=>['App\Controllers\FilmController', 'getShips'],
    '/starwars/api/planets'=>['App\Controllers\FilmController', 'getPlanet'],
    '/starwars/api/species'=>['App\Controllers\FilmController', 'getSpecies'],
    
];
 ?>