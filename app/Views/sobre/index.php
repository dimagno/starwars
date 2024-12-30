<?php
// Captura o conteúdo da view para inserir no layout
ob_start();
?>
<h2>Sobre </h2>
<p>Este projeto tem como finalidade realizar o desafio de criar um site com a tematica starwars, utilizando php, javascript, css com integração com API e banco de dados</p>
<?php
$conteudo = ob_get_clean(); // Obtém o conteúdo gerado e limpa o buffer
$titulo = "Sobre "; 
require_once '../app/Views/layouts/main.php'; // Inclui o layout principal
?>
