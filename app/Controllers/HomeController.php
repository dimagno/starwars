<?php

namespace App\Controllers;
use App\Models\Home;
use App\Controllers\FilmController;
 class HomeController {
    private $filmController;


    public function index(){
        $homeModel = new Home();
        $data = $homeModel->getInfo();
        $data = compact('data');
        require_once __DIR__ . '/../Views/index.php';

    }
    public function sobre(){
        //echo "VIEW 'SOBRE' EM DESENVOLVIMENTO";
        require_once __DIR__.'/../Views/sobre.php';
     
 }
 public function filmes(){
    /*$films=  new FilmController();
    $result = $films->listAllFilms();
    
    
    $data =compact('films');
    */
    require_once __DIR__.'/../Views/films.php';


 }
}