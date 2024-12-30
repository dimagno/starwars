<?php

namespace App\Controllers;
use App\Models\HomeModel;

 class HomeController {
    public function show(){
        $homeModel = new HomeModel();
        $data = $homeModel->getInfo();
        require_once '../app/Views/exemplo/index.php';
    }
 }