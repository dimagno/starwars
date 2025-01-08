<?php

namespace App\Controllers;
use App\Models\Home;
Use App\Services\ApiService;
use app\Database\Connection;
 class HomeController {
    private $filmController;
    private $apiService;
    private $connection;
     
    
    public function __construct()
    {
        $this->apiService = new ApiService();
        $this->connection = new Connection();
        
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
        $title = "Sobre";
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
 public function getLogs(){

    $sql= "SELECT * FROM logs";
    $result = $this->connection->query($sql);
    $result = ($result);
    require_once __DIR__.'/../Views/logs.php';

 }
}