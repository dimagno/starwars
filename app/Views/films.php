<?php include "layout/header.php" ?>
<div class="films ">
    <div class="header container-fluid row ">
        <div class="container py-5 bg-dark col-12 ">
            <h1 class="display-5 fw-bold text-warning    h1-display  ">Catalogo de filmes da saga Star Wars</h1>
            <p class=" text-center" style="text-align: center;">Este catálogo detalha os filmes da franquia Star Wars, com foco nos 6 primeiros episódios, conforme disponiveis pela API <a href="https://swapi-node.vercel.app" target="_blank"> swapi-node.vercel.app</a>. A saga é organizada em duas trilogias principais, que exploram as origens e os eventos centrais do universo Star Wars.</p>
        </div>

        <div class="galeria row ">

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

    .single-galeria {
        background: linear-gradient(black, #2b1055);
    }

    .single-galeria img {
        max-width: 100%;
        height: 300px;
        margin: 2px 0px;
    }

    .h1-display {
        font-family: 'StarJedi' !important;
        color: yellow;
    }

    .single-galeria h1 {
        font-family: 'StarJedi' !important;
        color: yellow;
    }

    .single-galeria p {
        text-size-adjust: 2px;

    }

    .single-galeria a {
        text-decoration: none;
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
        $.ajax({
                url: '/starwars/ajax/filmes',
                type: 'GET',
                dataType: 'JSON'
            })
            .done(function(data) {
                Toast.fire({
                    icon: "success",
                    title: "Consulta de filmes realizada com sucesso"
                });
                let newdata = Object.values(data);
                if (newdata[0] != 'error') {
                    var filmsArray = Object.values(data['data'])

                    filmsArray.forEach(function(item) {
                        makeView(item)
                    })
                } else {
                    Swal.fire({
                        'title': "Ops, algo está errado",
                        'text': data['message'],
                        'icon': 'error',
                        'confirmButtonText': 'fechar',

                    })

                }
            })

            .fail(function(xhr) {
                let cleanResponseText = xhr.responseText.replace(/^\d+/, '');
                let vari = JSON.stringify(cleanResponseText);
                // Converte o texto limpo para um objeto JSON
                let responseObject = cleanResponseText;
                let jsonObject = JSON.parse(responseObject);
                let valuesArray = Object.values(jsonObject);

                // Captura apenas a mensagem

                let errorMessage = responseObject['message'];
                Swal.fire({
                    'title': "Ops, algo está errado",
                    'text': errorMessage,
                    'icon': 'error',
                    'confirmButtonText': 'fechar',

                })
            });
    });

    function makeView(item) {

        let epCorrection = item.episode_id > 3 ? item.episode_id - 3 : item.episode_id + 3;

        var htmlContent = `
        <div class="single-galeria col-sm-12 col-lg-4 col-md-6 shadow shadow-lg border-1 border border-warning mb-2  pb-2 pt-2">
            <div class="d-flex flex-column align-items-center text-center">
                <img src="public/imgs/films/ep${item.episode_id}.jpg" class="img-fluid" alt="${item.title}">
                <div class="info">
                    <h1 class=' h1 notranslate'>${item.title}</h1>
                    <p class='fs-6 p-1'>${item.description}</p>
                    <a href="/starwars/filme/${epCorrection}" class='text-white btn btn-outline-warning  btn-lg' style='text-decoration:none;'>Ver Mais</a>
                </div>
            </div> 
        </div>
    `;
        $('.galeria').append(htmlContent)

    }
</script>