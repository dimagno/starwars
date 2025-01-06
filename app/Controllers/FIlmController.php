<?php

namespace app\Controllers;

use app\Services\ApiService;

use app\Services\ServiceLog as ServiceLog;
use app\Database\Connection;

class FilmController
{
    private  $log;
    private $serviceApi;
    private $connection;

    public function __construct()
    {
        $this->serviceApi = new ApiService();
        $this->log = new ServiceLog();
        $this->connection = new Connection();
    }

    // Endpoint para listar todos os filmes
    public function listAllFilms()
    {
        try {
            // Inicia uma transação
            if($this->connection->isConnected()){
            

            $this->connection->beginTransaction();

            // Obtém todos os filmes da API
            $films = $this->serviceApi->getAllMovies();

            if (empty($films)) {
                throw new \Exception("Nenhum filme encontrado");
            }

            // Prepara a mensagem de sucesso
            $message = "Consulta de filmes realizada com sucesso!";

            // Insere um registro no log no banco de dados
            $query = "INSERT INTO logs (description, status, date) VALUES (:desc, :stts, :dt)";
            $params = [
                ':desc' => $message,
                ':stts' => "success",
                ':dt' => date('Y-m-d H:i:s')
            ];
            $this->connection->execute($query, $params);
            $this->log->logRequest('200', 'Consulta da lista de filmes Realizada com sucesso','INFO');

            // Confirma a transação
            $this->connection->commit();

            // Filtra os dados dos filmes
            $filteredData = array_map(function ($item) {
                $filterIds = $this->extractIds($item['fields']['characters']);
                //  $characteresNames = $this->characteresFilm($filterIds, $item['fields']['title']);

                return [
                    "title" => $item['fields']["title"],
                    "description" => $item['fields']["opening_crawl"],
                    "release_date" => $item['fields']["release_date"],
                    "director" => $item['fields']["director"],
                    "producer" => $item['fields']["producer"],
                    'episode_id' => $item['fields']['episode_id'],
                    'characteres' => $filterIds
                ];
            }, $films);

            // Ordena os filmes pela data de lançamento
            usort($filteredData, function ($a, $b) {
                return strtotime($a['episode_id']) - strtotime($b['episode_id']);
            });

            // Registra a solicitação no log
            $this->log->logRequest('success', $message, "info");

            // Retorna os dados filtrados
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 'success',
                'data' => $filteredData
            ]);
        }
        else{
            echo json_encode([
                'status' => 'error',
                'data' => null,
                'message'=> "Falha ao se conectar com a base de dados"]);
                $this->log->logRequest('500',"Falha ao se conectar com a base", 'ERROR');

        }
        } catch (\Exception $e) {
            // Reverte a transação em caso de erro
            $this->connection->rollback();

            // Retorna o erro em formato JSON
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
    function extractIds($urls)
    {
        $ids = [];

        foreach ($urls as $url) {
            // Usando uma expressão regular para capturar a ID após "/api/people/"
            if (preg_match('/\/api\/people\/(\d+)/', $url, $matches)) {
                $ids[] = $matches[1];  // Adiciona a ID encontrada ao array
            }
        }

        return $ids;
    }


    // Endpoint para obter os detalhes de um filme

    function characteresFilm(array $characters, $film)
    {
        try {
            $data = [];

            foreach ($characters as $character) {

                $personagem = $this->serviceApi->getCharacter($character);

                array_push($data, $personagem['name']);
            }
            return json_encode($data);
            $this->log->logRequest('200', "Consulta de personagens do filme " . $film . " realizada com sucesso na API externa");
            return $data;
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
    public function filmDetail($id)
    {
        try {
            $filmDetails = $this->serviceApi->getMovie($id);
            $message = "Consulta do filme ".$filmDetails['title'] . " realizada com sucesso!";

            // Insere um registro no log no banco de dados
            $query = "INSERT INTO logs (description, status, date) VALUES (:desc, :stts, :dt)";
            $params = [
                ':desc' => $message,
                ':stts' => "success",
                ':dt' => date('Y-m-d H:i:s')
            ];
            $this->connection->beginTransaction();
            $this->connection->query($query, $params);
            $this->log->logRequest(200, $message, 'INFO');
            $characters = $filmDetails['characters'];
            $releaseDate = new \DateTime($filmDetails['release_date']);
            $currentDate = new \DateTime();
            $interval = $releaseDate->diff($currentDate);
            $filmAge = [
                'years' => $interval->y . " Anos",
                'months' => $interval->m . " Meses",
                'days' => $interval->d . " Dias",
            ];
            $original_date = $filmDetails['release_date'];
            $dataFormatada = \DateTime::createFromFormat('Y-m-d', $original_date)->format('d/m/Y');


            $filmAge = implode(',', $filmAge);
            $characters = $this->extractIds($characters);
            $characteresNames = json_decode($this->characteresFilm($characters, $filmDetails['title']));
            $formatedNames = implode(', ', $characteresNames);

            $filteredData = [
                "title" => $filmDetails["title"], // Título do filme
                "description" => $filmDetails["opening_crawl"], // Descrição (abertura)
                "release_date" => $dataFormatada, // Data de lançamento
                "director" => $filmDetails["director"], // Diretor
                "producer" => $filmDetails["producer"], // Produtor
                "episode_id" => $filmDetails["episode_id"], // ID do episódio
                'characters' => $formatedNames,
                'filmAge' => $filmAge


            ];
            $this->connection->commit();
           
        } 
        
        catch (\Exception $ex) {
            $return = ['message'=> $ex->getMessage(), 'code'=>$ex->getCode()];
            $this->connection->rollback();
            $this->log->logRequest('500',"Falha ao se conectar com a base", 'ERROR');
           
            echo $return;
        }

        require_once __DIR__ . '/../Views/filmDetail.php';
    }
    public function getFilmAge($id)
    {
        try {
            $film = $this->serviceApi->getMovie($id);

            if (!$film || !isset($film['release_date']) || !$this->isValidDate($film['release_date'])) {
                throw new \Exception("Filme não encontrado ou data de lançamento inválida.");
            }

            $releaseDate = new \DateTime($film['release_date']);
            $currentDate = new \DateTime();
            $interval = $releaseDate->diff($currentDate);

            $filmAge = [
                'years' => $interval->y,
                'months' => $interval->m,
                'days' => $interval->d,
            ];

            return json_encode([
                'status' => 'success',
                'data' => $filmAge
            ]);
        } catch (\Exception $e) {
            return json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    private function isValidDate($date)
    {
        $d = \DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }
}
