<?php

namespace app\Services;

use app\Database\Connection;

class ApiService
{
    private $baseUrl;
    private $connection;

    public function __construct()
    {
        $this->baseUrl = 'https://swapi-node.vercel.app/api/';
        $this->connection = new Connection();
    }

    private function fetchData($endpoint)
    {
        // Monta a URL completa
        $url = $this->baseUrl . $endpoint;

        // Inicializa cURL
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Retorna o resultado da requisição

        // Executa a requisição
        $response = curl_exec($curl);

        // Verifica se houve erro na requisição
        if (curl_errno($curl)) {
            $query = "INSERT INTO logs (description, status, date) VALUES (:desc, :stts, :dt)";
            $params = [
                ':desc' => 'Falha ao consultar na API na url '.$url,
                ':stts' => "error",
                ':dt' => date('Y-m-d H:i:s')
            ];
            $this->connection->execute($query,$params);

            throw new \Exception("Erro ao acessar a API externa: " . curl_error($curl));
        }

        curl_close($curl);

        // Decodifica o JSON em um array associativo
        $decodedResponse = json_decode($response, true);

        // Verifica se a resposta contém dados válidos
        if (isset($decodedResponse['fields'])) {
            return $decodedResponse['fields'];
        } elseif (isset($decodedResponse['results'])) {
            return $decodedResponse['results'];
        } else {
            $query = "INSERT INTO logs (description, status, date) VALUES (:desc, :stts, :dt)";
            $params = [
                ':desc' => 'Falha ao consultar na API na url '.$url,
                ':stts' => "error",
                ':dt' => date('Y-m-d H:i:s')
            ];
            $this->connection->execute($query,$params);
            throw new \Exception("Resposta inválida da API.");
        }
    }

    public function getAllMovies()
    {
        return $this->fetchData('films');
    }

    public function getMovie($id)
    {
        return $this->fetchData('films/' . $id);
    }

    public function getCharacter($id)
    {
        return $this->fetchData('people/' . $id);
    }

    public function getAllCharacters()
    {
        return $this->fetchData('people');
    }

    public function getAllPlanets()
    {
        return $this->fetchData('planets');
    }

    public function getPlanet($id)
    {
        return $this->fetchData('planets/' . $id);
    }
}
