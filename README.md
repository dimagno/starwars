# Star Wars API Project

Este é um projeto desenvolvido para consumir dados da API Star Wars e exibi-los de maneira interativa em uma aplicação web.

## Tecnologias Utilizadas
- PHP 7.4
- MySQL
- PDO
- cURL
- JavaScript (jQuery, AJAX)
- CSS (Bootstrap)
- SweetAlert2
- MVC (Model-View-Controller)

## Instalação

1. **Clonar o repositório:**
   Clone este repositório para sua máquina local usando o seguinte comando:
   ```bash
   git clone https://github.com/dimagno/starwars.git

## Configurando banco de dados
1. Crie um arquivo .env na raiz do seu projeto com as seguintes configurações:
     ```bash
   DB_USER='root'
   DB_HOST=127.0.0.1
   DB_NAME=sw
   DB_PASS=''
     ```
3. crie uma base de dados com o nome definido em DB_NAME (no caso, sw).
4. Na pasta app/database/dump, você encontrará um arquivo SQL para importar no seu banco de dados.
5. Importe o dump utilizando o seguinte comando:  mysql -u root -p sw < /caminho/do/dump.sql

## configuração  do servidor
1. Coloque o projeto no diretório raiz do seu servidor web (Apache/Nginx).
2. Acesse o projeto no seu navegador através do endereço configurado, como http://localhost/starwars

## Arquivos de log:
1. Os logs serão salvos na pasta logs como arquivos de texto simples. Verifique api_logs.txt para ver detalhes de erros e consultas feitas à API.

## funcionalidades
1. Catálogo de filmes: Exibe a lista de filmes ordenados por data de lançamento.
2. Detalhes do filme: Ao clicar em um filme, são exibidos detalhes como título, episódio, sinopse, data de lançamento, diretor(a), produtores e personagens.
3.Logs de Interação: Cada interação com a API do Star Wars gera um log no banco de dados e no arquivo de log.
4. Pagina de visualização dos logs. a senha para visualizar é:
 ```bash
 1234
   ```
###


   
Esse arquivo contém todas as instruções necessárias para instalação e execução do projeto, além de dar uma visão geral das funcionalidades. O arquivo .docx contendo a documentação do projeto está na raiz do projeto. Se precisar de mais alguma informação,ajustes ou adiçoes me avise!!
