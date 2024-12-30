<?php
class ServiceApi{
    private $baseUrl;

    public function __construct(){
        $this->baseUrl ='https://swapi-node.vercel.app/';

    }
    private function fetchData($endpoint) {
        // Monta a URL completa
        $url = $this->baseUrl . $endpoint . '/';

        // Inicializa cURL
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Retorna o resultado da requisição

        // Executa a requisição
        $response = curl_exec($curl);

        // Verifica se houve erro na requisição
        if (curl_errno($curl)) {
            throw new Exception("Erro ao acessar a API externa: " . curl_error($curl));
        }

        curl_close($curl);

        // Retorna os dados como array associativo
        return json_decode($response, true);
    }
    public function getAllPeoples() {
        return $this->fetchData('people');
    }
    public function getPeole($id){
        return $this->fetchData('people/'.$id);

    }
    public function getAllVehicles() {
        return $this->fetchData('vehicles');
    }
    public function getVehicle($id){
        return $this->fetchData('vehicles/'.$id);
    }
    public function getAllPlanets(){
        return $this->fetchData('planets');
    }
    public function getPlanet($id){
        return $this->fetchData('planets/'.$id)
;
    }
    public function getAllMovies(){
        return $this->fetchData('films');
    }
    public function getMovie($id){
        
        return $this->fetchData('films/'.$id);
    }
    public function getAllSpecies(){
        return $this->fetchData('species');
    }
    public function getSpecie($id){
        
        return $this->fetchData('species/'.$id);
    }

}