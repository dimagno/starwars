<?php include "layout/header.php" ?>

<div class="container-fluid py-5 bg-dark col-12 container-index text-center">
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <!--<ol class="carousel-indicators">
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"></li>
        
    </ol>-->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/starwars/public/imgs/slide/ep1.png" class="d-block w-100" alt="Imagem 1">
        </div>
        <div class="carousel-item">
            <img src="/starwars/public/imgs/slide/ep2.png" class="d-block w-100" alt="Imagem 2">
        </div>
        <div class="carousel-item">
            <img src="/starwars/public/imgs/slide/ep3.png" class="d-block w-100" alt="Imagem 3">
        </div>
        <div class="carousel-item">
            <img src="/starwars/public/imgs/slide/ep4.png" class="d-block w-100" alt="Imagem 4">
        </div>
        <div class="carousel-item">
            <img src="/starwars/public/imgs/slide/ep5.png" class="d-block w-100" alt="Imagem 5">
        </div>
        <div class="carousel-item">
            <img src="/starwars/public/imgs/slide/ep6.png" class="d-block w-100" alt="Imagem 6">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Próximo</span>
    </a>
</div>
   <h1 class="display-5 fw-bold text-warning h1-display text-welcome">Bem vindos</h1>
   <p class="text-center pt-2 pb-2 mt-2 mb-2 fs-6" style="font-family: sans-serif;">
      Este é o seu ponto de acesso ao universo fascinante de Star Wars. Explore cada detalhe de uma das maiores sagas da história: dos filmes que moldaram a cultura pop, aos personagens inesquecíveis que enfrentaram dilemas entre luz e escuridão. Descubra os planetas que abrigam civilizações únicas, as naves e veículos que cruzam a galáxia, e os elementos que tornam este universo tão vasto e intrigante.

      A jornada começa aqui. Mergulhe na história, na mitologia e nos detalhes de Star Wars, e permita-se explorar cada canto de uma galáxia muito, muito distante.
   </p>
   <a href="/starwars/filmes" class="btn btn-lg btn-warning text-center btn-rounded">Explorar</a>
</div>
<style>
     .carousel-inner img {
            max-height: 500px;
            object-fit: cover;
            object-position: center;
            width: 100%;
        }
</style>
<?php include "layout/footer.php" ?>