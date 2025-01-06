<?php include "layout/header.php" ?>
<div class="films ">
    <div class="header ">
        <div class="container-fluid py-5 bg-dark row">
            <h1 class="display-5 fw-bold text-warning text-left d-flex  h1-display  ">Catalogo de filmes da saga Star Wars</h1>
            <p class="col-md-8 text-center" style="text-align: center;">Este catálogo detalha os filmes da franquia Star Wars, com foco nos 6 primeiros episódios, conforme especificado pela API <a href="https://swapi-node.vercel.app" target="_blank"> swapi-node.vercel.app</a>. A saga é organizada em duas trilogias principais, que exploram as origens e os eventos centrais do universo Star Wars.</p>
        </div>

        <div class="galeria row">

            <!--<div class="single-galeria col-sm-4 shadow shadow-lg ">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="public/imgs/films/ep1.jpg?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwzM3x8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="img-fluid" alt="">

                    <div class="info">
                        <h1>Título</h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam labore.</p>
                        <a href="#">Ver Mais</a>
                    </div>
                </div> 
            </div>-->




        </div>
    </div>
</div>
<?php include "layout/footer.php" ?>
<style>
    .single-galeria {
        border-radius: 4px;


    }

    .single-galeria img {
        max-width: 100%;
        height: 300px;
        margin: 2px 0px;
    }
    .h1-display{
        font-family: 'StarJedi';
        color:yellow;
    }

    .single-galeria h1 {
        font-family: 'StarJedi';
        color: yellow;
    }

    .single-galeria p {
        text-size-adjust: 2px;

    }
    .single-galeria a{
        text-decoration: none;
    }
    .single-galeria a:hover{
        text-decoration: underline;
        
    }
</style>
<script>
    $(document).ready(function() {
        $.ajax({
                url: '/starwars/ajax/filmes',
                type: 'GET',
                dataType: 'JSON'
            })
            .done(function(data) {
                var filmsArray = Object.values(data['data'])
                console.log("Sucesso M:", data['data']);
                console.log("array films:" + filmsArray)
                filmsArray.forEach(function(item) {
                    makeView(item)
                })
            })
            .fail(function(err) {
                console.log("Erro @:", err);
            });
    });

    function makeView(item) {
        console.log("itens: " + item)
        var htmlContent = `
        <div class="single-galeria col-sm-4 shadow shadow-lg border-1  border-end border-bottom border-secondary mb-2  pb-2 pt-2">
            <div class="d-flex flex-column align-items-center text-center">
                <img src="public/imgs/films/ep${item.episode_id}.jpg" class="img-fluid" alt="${item.title}">
                <div class="info">
                    <h1 class=' h1'>${item.title}</h1>
                    <p class='fs-6 p-1'>${item.description}</p>
                    <a href="/starwars/filme/${item.episode_id}" class='text-warning'>Ver Mais</a>
                </div>
            </div> 
        </div>
    `;
        $('.galeria').append(htmlContent)

    }
</script>