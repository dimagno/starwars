<?php

namespace app\Services;

class ApiService
{
    private $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://swapi-node.vercel.app/api/';
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
