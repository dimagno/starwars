<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="icon" href="/starwars/public/imgs/icon.png" type="image/png">
    <link rel="stylesheet" href="/starwars/public/css/style.css">
    
    
   
</head>

 <body>
 <header class="navbar navbar-expand-lg navbar-dark fixed-top" id="navbar">
    <a href="#" class="navbar-brand text-white   notranslate" ><span class="text-warning span-icon" id="span-icon">M</span>agno</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse notranslate" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="  notranslate" href="/starwars">Home</a>
            </li>
            <li class="nav-item">
                <a class="  notranslate" href="<?php echo BASE_URL . 'starwars/filmes'; ?>">Films</a>
            </li>
            <li class="nav-item">
                <a class="  notranslate" href="#">Logs</a>
            </li>
            <li class="nav-item">
                <a class="  notranslate" href="<?php echo BASE_URL . 'starwars/sobre'; ?>">Documentation</a>
            </li>
        </ul>
    </div>
</header><section>
      <img src="/starwars/public/imgs/moon.png" alt="" class="moon">
      <img src="/starwars/public/imgs/stars.png" alt="" class="stars">
      <img src="/starwars/public/imgs/mountains_behind.png" class="mountain-b" alt="">
      <h2 id="text" class="text-warning notranslate">  <?php echo isset($title)?$title:" Films" ?></h2>
      
      <img src="/starwars/public/imgs/mountains_front.png" class="mountain-f" alt="">
   </section>
<div class="sec container-fluid">
