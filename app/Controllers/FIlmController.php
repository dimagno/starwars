<?php

namespace app\Controllers;

use app\Controllers\Services\ServiceApi;

class FilmController
{
    private $serviceApi;

    public function __construct()
    {
        $this->serviceApi = new ServiceApi();
    }

    // Endpoint para listar todos os filmes
    public function listAllFilms()
    {
        try {
            $films = $this->serviceApi->getAllMovies();

            if (empty($films)) {
                throw new \Exception("Nenhum filme encontrado.");
            }

            // Ordenar os filmes por data de lançamento
            usort($films, function ($a, $b) {
                return strtotime($a['release_date']) - strtotime($b['release_date']);
            });

            // Retorna a lista de filmes em formato JSON
            echo json_encode([
                'status' => 'success',
                'data' => $films
            ]);
        } catch (\Exception $e) {
            // Captura erros e retorna como JSON
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    // Endpoint para obter os detalhes de um filme
    public function getFilmAge($id)
    {
        try {
            $film = $this->serviceApi->getMovie($id);

            if (!$film) {
                throw new \Exception("Filme não encontrado.");
            }

            // Calcular a idade do filme
            $releaseDate = new \DateTime($film['release_date']);
            $currentDate = new \DateTime();
            $interval = $releaseDate->diff($currentDate);

            // Formatar a resposta com a idade do filme
            $filmAge = [
                'age' => [
                    'years' => $interval->y,
                    'months' => $interval->m,
                    'days' => $interval->d,
                ],
            ];

            // Retorna a idade do filme em formato JSON
            echo json_encode([
                'status' => 'success',
                'data' => $filmAge
            ]);
        } catch (\Exception $e) {
            // Captura erros e retorna como JSON
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
