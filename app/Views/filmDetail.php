<?php include "layout/header.php";
$nameEp = '/starwars/public/imgs/films/ep' . $filteredData['episode_id'] . '.jpg';
?>
<input type="hidden" value="<?php echo $filteredData['episode_id'] ?>" id="episode_id">
<div class="filmDetail bg-dark">
  <p class="text-warning display display-1 pt-2 pb-2 mt-2 mb-2"> <?php echo  $filteredData['title'] ?> - EP <?php echo $filteredData['episode_id'] ?></p>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <button class="btn btn-primary position-absolute bottom-0 start-0 mb-3 ms-3" onclick="history.back();">
          Voltar
        </button>

      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 module come-in">
        <div class="img3">
          <img src="<?php echo $nameEp ?>" lass='<?php echo $filteredData['episode_id']; ?>' alt="img1" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 module come-in">
        <div class="con1">
          <span class='text-warning'>DESCRIPTION</span>
          <p class="p fs-6 fw-light border-bottom p-2"><?php echo $filteredData['description'] ?></p>
        </div>
        <div class="con1">
          <span class='text-warning'> DIRECTOR:</span>
          <p class='p fs-6 fw-light text-left border-bottom p-2'><?php echo $filteredData['director'] ?></p>
        </div>

        <div class="con1">
          <span class='text-warning'> PRODUCER:</span>
          <p class='p fs-6 fw-light text-left border-bottom p-2'><?php echo $filteredData['producer'] ?></p>
        </div>

        <div class="con1 border-bottom">
          <span class='text-warning'> CHARACTERES:</span>
          <p class='p fs-6 fw-light text-left  p-2' id='characters'>
            <li id="loadingIcon" class="list-inline-item text-white">
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Carregando...
            </li>
          </p>
        </div>
        <div class="con1">
          <span class='text-warning'>EPISODE Number</span>
          <p class="p fs-6 fw-light border-bottom p-2"><?php echo $filteredData['episode_id'] ?></p>
        </div>
        
        <div class="con1">
          <span class='text-warning'> RELEASE DATE:</span>
          <p class='p fs-6 fw-light text-left border-bottom p-2'><?php echo $filteredData['release_date'] . ' (' . $filteredData['filmAge'] . '.)' ?></p>
        </div>
        <button class="btn btn-secondary position-absolute bottom-0 start-0 mb-3 ms-3 text-white" onclick="history.back();">
        Voltar
      </button>
      </div>
    
    </div>

    <div class="col-lg-12 mb-2 mt-2 p-2">
      <h2 class='h2 text-warning text-center mt-4  p-3'> more informations </h1>

    </div>
    <!-- Seção de Veículos -->
    <div class="col-lg-12">
      <div class="list-section">
        <h2 class="text-warning h2 text-center">aircrafts</h2>
        <ul class="d-flex flex-wrap justify-content-center list-inline " id="listNaves">
          <li id="loadingIcon3" class="list-inline-item text-white">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Carregando...
          </li>

        </ul>
      </div>
    </div>

    <!-- Seção de Planetas -->
    <div class="col-lg-12">
      <div class="list-section">
        <h2 class="text-warning h2 text-center">Planets</h2>
        <ul class="d-flex flex-wrap justify-content-center list-inline" id="planets">
          <li id="loadingIcon" class="list-inline-item text-white">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Carregando...
          </li>
        </ul>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="list-section">
        <h2 class="text-warning h2 text-center ">Species</h2>
        <ul class="d-flex flex-wrap justify-content-center list-inline " id="species">
          <li id="loadingIcon3" class="list-inline-item text-white">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Carregando...
          </li>
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
    float: left;
    text-align: left;
  }

  .p {
    font-size: 1px;
    font-family: sans-serif, 'Courier New', Courier, monospace;
  }

  .list-section {
    padding: 20px;
    background: linear-gradient(to top, #696969, #000);
    /* Gradiente de azul escuro para azul claro */
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

  .list-inline {
    width: 100%;
  }

  .list-section .list-inline-item {
    font-size: 0.9rem;
    margin: 0 15px;
    margin-bottom: 10px;
  }

  .d-flex.flex-wrap {
    gap: 10px;
    /* Adiciona espaço entre os itens */
  }

  .list-section .text-white {
    color: white !important;
  }

  .h1,
  .h2 {
    font-family: 'StarJedi';
    color: yellow;
  }

  .display {
    font-family: 'StarJedi';
  }
</style>
<script>
  $(document).ready(function() {
    const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
  
    $('#loadingIcon').hide();

    let epId = $('#episode_id').val();
    console.log(epId)

    $.ajax({
      url: '/starwars/api/peoples',
      type: "GET",
      data: {
        'episode_id': $('#episode_id').val()
      },
      beforeSend: function() {
        // Mostra o ícone de carregamento
        $('#loadingIcon').show();
      }

    }).done(function(e) {
      Toast.fire({
                    icon: "success",
                    title: "Consulta de personagens realizada com sucesso!"
                });
      // console.log("data"+e)
      $('#loadingIcon').hide();
      let data = JSON.parse(e)
      $('#characters').append(e);

    }).fail(function(error) {
      console.log(error)
    })

    $.ajax({
      url: '/starwars/api/starships',
      type: "GET",
      data: {
        'episode_id': $('#episode_id').val()
      },
      beforeSend: function() {
        // Mostra o ícone de carregamento
        $('#loadingIcon2').show();
      }

    }).done(function(e) {
      Toast.fire({
                    icon: "success",
                    title: "Consulta de aeronaves realizada com sucesso!"
                });
      $('#loadingIcon2').hide()
      let data = JSON.parse(e)
      $('#listNaves').html(data);


    }).fail(function(error) {
      console.log(error)

    })
    $.ajax({
      url: '/starwars/api/planets',
      type: "GET",
      data: {
        'episode_id': $('#episode_id').val()
      },


    }).done(function(e) {
      Toast.fire({
                    icon: "success",
                    title: "Consulta de planetas realizada com sucesso!"
                });
      let data = JSON.parse(e)

      console.log("Planets " + e)
      $('#loadingIcon2').hide();


      $('#planets').html(data)

    }).fail(function(error) {
      console.log(error)

    })
    $.ajax({
      url: '/starwars/api/species',
      type: "GET",
      data: {
        'episode_id': $('#episode_id').val()
      },
      beforeSend: function() {
        // Mostra o ícone de carregamento
        $('#loadingIcon3').show();
      }

    }).done(function(e) {
      Toast.fire({
                    icon: "success",
                    title: "Consulta de especies realizada com sucesso!"
                });
      console.log("especies " + e)
      let data = JSON.parse(e)
      $('#species').html(data)

    }).fail(function(error) {
      console.log(error)

    })
  })
</script>