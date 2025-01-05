<?php include "layout/header.php" ?>
<div class="films">
    <div class="header">
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
    .single-galeria h1 {
        font-family: 'StarJedi';
        color:red;
    }
    .single-galeria p {
        text-size-adjust: 2px;
        
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
                console.log("array films:"+ filmsArray)
                filmsArray.forEach(function(item) {
                    makeView(item)
                })
            })
            .fail(function(err) {
                console.log("Erro @:", err);
            });
    });

    function makeView(item) {
        console.log("itens: "+item)
        var htmlContent = `
        <div class="single-galeria col-sm-4 shadow shadow-lg border-1  border-end border-bottom border-secondary mb-2  pb-2 pt-2">
            <div class="d-flex flex-column align-items-center text-center">
                <img src="public/imgs/films/ep${item.episode_id}.jpg" class="img-fluid" alt="${item.title}">
                <div class="info">
                    <h1 class=' h1'>${item.title}</h1>
                    <p class='fs-6 p-1'>${item.description}</p>
                    <a href="#" class='text-warning'>Ver Mais</a>
                </div>
            </div> 
        </div>
    `;  
                $('.galeria').append(htmlContent)

    }
</script>