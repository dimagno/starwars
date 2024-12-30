<?php

namespace App\Controllers;
use App\Models\Home;

 class HomeController {
    public function index(){
        $homeModel = new Home();
        $data = $homeModel->getInfo();
        require_once __DIR__ . '/../Views/exemplo/index.php';

    }
 }