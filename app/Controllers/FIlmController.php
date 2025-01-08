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
            if ($this->connection->isConnected()) {


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
                $this->log->logRequest(200, 'Consulta da lista de filmes Realizada com sucesso', 'INFO');

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
                $this->log->logRequest(200, $message, "info");

                // Retorna os dados filtrados
                header('Content-Type: application/json');
                echo json_encode([
                    'status' => 'success',
                    'data' => $filteredData
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'data' => null,
                    'message' => "Falha ao se conectar com a base de dados"
                ]);
                $this->log->logRequest(500, "Falha ao se conectar com a base", 'ERROR');
            }
        } catch (\Exception $e) {
            // Reverte a transação em caso de erro
            $this->connection->rollback();

            // Retorna o erro em formato JSON
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
            $this->log->logRequest(500, $e->getMessage(), 'ERROR');
        }
    }
    function extractIds($urls, $method = true)
    {
        $ids = [];

        foreach ($urls as $url) {
            // Usando uma expressão regular para capturar a ID após "/api/people/"
            if ($method) {
                if (preg_match('/\/api\/people\/(\d+)/', $url, $matches)) {
                    $ids[] = $matches[1];  // Adiciona a ID encontrada ao array
                }
            } else {

                if (preg_match('/\/api\/starships\/(\d+)/', $url, $matches)) {
                    $ids[] = $matches[1];
                }
            }
        }

        return $ids;
    }
    function extractIds2($urls, $flag = false)
    {
        $ids = [];
        foreach ($urls as $url)
            if (!$flag) {
                if (preg_match('/\/api\/planets\/(\d+)/', $url, $matches))
                    $ids[] = $matches[1];
            } else {
                if (preg_match('/\/api\/species\/(\d+)/', $url, $matches))
                    $ids[] = $matches[1];
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
            $this->log->logRequest(200, "Consulta de personagens do filme " . $film . " realizada com sucesso na API externa");

            return json_encode($data);
        } catch (\Exception $ex) {
            return $ex->getMessage();
            $this->log->logRequest(500, "Erro durante a consulta de personagens: " . $ex->getMessage(), 'ERROR');
        }
    }

    public function filmDetail($id)
    {
        try {
            $title = "Detalhes do filme";
            $filmDetails = $this->serviceApi->getMovie($id);
        $message = "Consulta do filme " . $filmDetails['title'] . " realizada com sucesso!";

            $query = "INSERT INTO logs (description, status, date) VALUES (:desc, :stts, :dt)";
            $params = [
                ':desc' => $message,
                ':stts' => "success",
                ':dt' => date('Y-m-d H:i:s')
            ];

           
            $this->connection->query($query, $params);
            $this->log->logRequest(200, $message, 'INFO');

            $releaseDate = new \DateTime($filmDetails['release_date']);
            $currentDate = new \DateTime();
            $interval = $releaseDate->diff($currentDate);

            $filmAge = implode(', ', [
                $interval->y . " Anos",
                $interval->m . " Meses",
                $interval->d . " Dias"
            ]);

            $dataFormatada = $releaseDate->format('d/m/Y');

            $filteredData = [
                "title" => $filmDetails["title"],
                "description" => $filmDetails["opening_crawl"],
                "release_date" => $dataFormatada,
                "director" => $filmDetails["director"],
                "producer" => $filmDetails["producer"],
                "episode_id" => $filmDetails["episode_id"],
                'filmAge' => $filmAge,
                ];
        } catch (\Exception $ex) {
            $this->log->logRequest(500, $ex->getMessage(), 'ERROR');
            echo json_encode(['message' => $ex->getMessage(), 'code' => $ex->getCode()]);
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
    public function getStarships(array $ids)
    {
        $starships = [];
        foreach ($ids as $id)
            array_push($starships, $this->serviceApi->getStarship($id)['starship_class']);
        return ($starships);
    }
    public function getPlanets($ids)
    {
        $planets = [];
        foreach ($ids as $id) {
            array_push($planets, $this->serviceApi->getPlanet($id)['name']);
        }
        return $planets;
    }
    function getSpecie(array $ids)
    {
        $species = [];
        foreach ($ids as $id)
            array_push($species, $this->serviceApi->getSpecie($id)['name']);

        return $species;
    }
    public function getPeoples()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['episode_id'])) {
            $episode_id = $_GET['episode_id'];
            $episode_id = ($episode_id > 3) ? $episode_id - 3 : $episode_id + 3;
            $charactersList = $this->serviceApi->getMovie($episode_id)['characters'];
            $ids = $this->extractIds($charactersList);
            $stringNames = "";
            foreach ($ids as $id) {
                $stringNames .= $this->serviceApi->getCharacter($id)['name'] . ", ";
            }
            echo json_encode($stringNames);
        } else {
            echo "ERRO";
        }
    }
    public function getShips()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['episode_id'])) {
            $episode_id = $_GET['episode_id'];
            $episode_id = ($episode_id > 3) ? $episode_id - 3 : $episode_id + 3;
            $starships = $this->serviceApi->getMovie($episode_id)['starships'];
            $starships = $this->extractIds($starships, false);


            $stringNames = "";
            $listItems = '';
            $starships = $this->getStarships($starships);
            foreach ($starships as $starship) {

                $listItems .= '<li class="list-inline-item text-white">' . htmlspecialchars($starship) . '</li>';
            }
            echo json_encode($listItems);
        } else {
            echo "ERRO";
        }
    }
    public function getPlanet(){
         if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['episode_id'])) {
            $episode_id = $_GET['episode_id'];
            $episode_id = ($episode_id > 3) ? $episode_id - 3 : $episode_id + 3;
            $planets = $this->serviceApi->getMovie($episode_id)['planets'];
            $planets = $this->extractIds2($planets, false);


            $listItems = '';
            $planets = $this->getPlanets($planets);
            foreach ($planets as $planets) {

                $listItems .= '<li class="list-inline-item text-white">' . htmlspecialchars($planets) . '</li>';
            }
            echo json_encode($listItems);
        } else {
            echo "ERRO";
        }
    

    }
    public function getSpecies(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['episode_id'])) {
           $episode_id = $_GET['episode_id'];
           $episode_id = ($episode_id > 3) ? $episode_id - 3 : $episode_id + 3;
           $species= $this->serviceApi->getMovie($episode_id)['species'];
           $species = $this->extractIds2($species, true);


           $listItems = '';
           $species = $this->getSpecie($species);
           foreach ($species as $species) {

               $listItems .= '<li class="list-inline-item text-white">' . htmlspecialchars($species) . '</li>';
           }
           echo json_encode($listItems);
       } else {
           echo "ERRO";
       }
   

   }
}
