<?php

namespace App\Controllers;
use App\Models\Home;
Use App\Services\ApiService;
 class HomeController {
    private $filmController;
    private $apiService;
     
    
    public function __construct()
    {
        $this->apiService = new ApiService();
        
    }

    public function index(){
        $title= "Home";
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
 public function getAllMovies(){

     echo json_encode($this->apiService->getAllMovies());
    
   
 
 }
 
 public function getFilm($id){
    echo json_encode($this->apiService->getMovie($id));

 }
}