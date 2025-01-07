<?php include "layout/header.php";
$nameEp = '/starwars/public/imgs/films/ep' . $filteredData['episode_id'] . '.jpg';
?>
<div class="filmDetail bg-dark">
  <p class="text-warning display display-1 pt-2 pb-2 mt-2 mb-2"> <?php echo  $filteredData['title'] ?> - EP <?php echo $filteredData['episode_id']?></p>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 module come-in">
        <div class="img3">
          <img src="<?php echo $nameEp ?>" lass='<?php echo $filteredData['episode_id']; ?>' alt="img1" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 module come-in">
        <div class="con1">
          <span class='text-warning'>DESCRIPTION</span>
          <p class="p fs-6 fw-light border-bottom p-2"><?php echo $filteredData['description'] ?></p>

          <div class="con1">
            <span class='text-warning'> DIRECTOR:</span>
            <p class='p fs-6 fw-light text-left border-bottom p-2'><?php echo $filteredData['director'] ?></p>
          </div>

          <div class="con1">
            <span class='text-warning'> PRODUCER:</span>
            <p class='p fs-6 fw-light text-left border-bottom p-2'><?php echo $filteredData['producer'] ?></p>
          </div>

          <div class="con1">
            <span class='text-warning'> CHARACTERES:</span>
            <p class='p fs-6 fw-light text-left border-bottom p-2'><?php echo $filteredData['characters'] ?></p>
          </div>
          <div class="con1">
            <span class='text-warning'> RELEASE DATE:</span>
            <p class='p fs-6 fw-light text-left border-bottom p-2'><?php echo $filteredData['release_date'] . ' (' . $filteredData['filmAge'] . '.)' ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 mb-2 mt-2 p-2">
        <h2 class='h2 text-warning text-center mt-4  p-3'> more informations  </h1>

      </div>
      <!-- Seção de Veículos -->
      <div class="col-lg-12">
        <div class="list-section">
          <h2 class="text-warning h2 text-center">aircrafts</h2>
          <ul class="d-flex flex-wrap justify-content-center list-inline">
            <?php foreach($filteredData['starships'] as $starship) {?>
            <li class="list-inline-item text-white"><?php echo $starship ?></li>
            <?php } ?>
          </ul>
        </div>
      </div>

      <!-- Seção de Planetas -->
      <div class="col-lg-12">
        <div class="list-section">
          <h2 class="text-warning h2 text-center">Planets</h2>
          <ul class="d-flex flex-wrap justify-content-center list-inline">
          <?php foreach($filteredData['planets'] as $planet) {?>
            <li class="list-inline-item text-white"><?php echo $planet ?></li>
            <?php } ?>
          </ul>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="list-section">
          <h2 class="text-warning h2 text-center ">Species</h2>
          <ul class="d-flex flex-wrap justify-content-center list-inline ">
          <?php foreach($filteredData['species'] as $specie) {?>
            <li class="list-inline-item text-white"><?php echo $specie ?></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "layout/footer.php" ?>
<style>
  .con1 span {
    font-weight: 350;
    font-size: 18px;
    text-transform: uppercase;
    padding-bottom: 5px;
    
    font-family: sans-serif;
    color: rgb(172, 175, 37);
  }

  .cont1 p {
    color: #696969;
    font-size: 10px;
    float:left;
    text-align: left;
  }

  .p {
    font-size: 1px;
    font-family: sans-serif, 'Courier New', Courier, monospace;
  }
  .list-section {
  padding: 20px;
  background: linear-gradient(to top, #696969, #000); /* Gradiente de azul escuro para azul claro */
  border-radius: 4px;
}

.list-section h2 {
  margin-bottom: 15px;
  font-size: 1.25rem;
  font-weight: bold;
}

.list-section ul {
  padding-left: 0;
  margin: 0;
}
.list-inline{
  width: 100%;
}

.list-section .list-inline-item {
  font-size: 0.9rem;
  margin: 0 15px ;
  margin-bottom: 10px;
}
.d-flex.flex-wrap {
  gap: 10px; /* Adiciona espaço entre os itens */
}

.list-section .text-white {
  color: white !important;
}
.h1, .h2{
  font-family: 'StarJedi';
  color:yellow;
}
.display{
  font-family: 'StarJedi';
}
</style>