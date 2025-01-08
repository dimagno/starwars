<?php include "layout/header.php"; ?>
<div class="container ">
    <!-- Seção: Título -->
    <div class="col-12 p-3 mb-3 rounded bg-dark">
        <h2 class="h2 text-center  text-warning mb-4">Sobre o Projeto</h2>
        <p>Este projeto tem como objetivo criar um catálogo interativo de filmes da franquia Star Wars, utilizando uma API pública para obter dados detalhados sobre os filmes e exibi-los de maneira amigável para os usuários.
            A aplicação consome dados da <strong><a href="https://swapi-node.vercel.app/" target="_blank" class="text-link">Api Star Wars</a></strong> e os exibe de forma organizada. A cada requisição, um log é gerado no banco de dados e outro em um arquivo de texo. Com um design é responsivo, garantindo uma boa experiência em diferentes dispositivos.
        </p>
    </div>
    <div class="col-12 p-3 mb-3 rounded bg-dark">
        <h3 class="text-warning text-center">Como funciona?</h3>
        <p>Ao acessar a aplicação, o usuário é apresentado a uma lista de filmes ordenados por data de lançamento. Cada filme exibe o título, capa e uma descrição. Ao clicar em "ver mais", são apresentados detalhes como: titulo do filme, numero do episódio, diretor, produtor, personagens, sinopse, data de lançamento, idade do filme (em dias meses e anos).
            <br> A aplicação também faz uso da API para obter dados adicionais sobre o filme selecionado, como planetas , naves e espécies que aparecem no filme.
        </p>
        </p>
    </div>
    </p>
    <div class="row">
        <!-- Seção: Funcionalidades -->
        <section class="col-12 mb-4 p-3 bg-dark text-white rounded">
            <div class="row">
                <h3 class="h3 mb-3 text-warning col-md-6 col-lg-6 col-sm-12">Funcionalidades Principais</h3>
                <ul class="list-unstyled col-md-6 col-lg-6 col-sm-12">
                    <li class="mb-2"><strong class="text-warning">Catálogo de Filmes</strong>: Exibição dos filmes de Star Wars ordenados por data de lançamento.</li>
                    <li class="mb-2"><strong class="text-warning">Detalhes dos Filmes</strong>: Informações como título, episódio, sinopse, data de lançamento, diretor(a), produtores e personagens.</li>
                    <li class="mb-2"><strong class="text-warning">Logs de Interação</strong>: Registro de interações com a API, tanto no banco de dados como em arquivos de texto, para fornecer uma opção alternativa de monitoramento .</li>
                    <li class="mb-2"><strong class="text-warning">Responsividade</strong>: Design adaptável a dispositivos móveis.</li>
                </ul>
            </div>
        </section>

        <!-- Seção: Tecnologias -->
        <section class="col-12 mb-4 p-3 bg-dark text-white rounded">
            <div class="row">
                <h3 class="h3 mb-3 text-warning col-sm-12 col-lg-6 col-md-6">Tecnologias e bibliotecas </h3>
                <ul class="list-unstyled col-sm-12 col-lg-6 col-md-6">
                    <li class="mb-2"><strong class="text-warning">PHP :</strong> utilizando POO (programação orientada a objetos).</li>
                    <li class="mb-2"><strong class="text-warning">MYSql:</strong> com PDO para conexões com o banco de dados mais confiáveis e de fácil manutenção. </li>
                    <li class="mb-2"><strong class="text-warning">JavaScript/jquery:</strong> para requisições AJAX e interações dinâmicas.</li>
                    <li class="mb-2"><strong class="text-warning">CSS/Bootstrap:</strong> para responsividade e estilização dos elementos externos.</li>
                    <li class="mb-2"><strong class="text-warning">SweetAlerts2:</strong> para alertas e modais dinâmicos e mais amigáveis.</li>
                    <li><strong class="text-warning">curl:</strong> para o consumo da API.</li>
                </ul>
            </div>
        </section>
    </div>
</div>
<style>
    h3,
    h2,
    strong {
        font-family: 'StarJedi';

    }
</style>
<?php include "layout/footer.php"; ?>