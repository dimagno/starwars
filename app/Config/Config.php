<?php

namespace app\Config;

class Config
{
    private $config;

    public function __construct()
    {
        // Carrega as variáveis de ambiente
        $this->load();
    }

    private function load()
    {
        $this->config = [
            'DB_HOST' => getenv('DB_HOST'),
            'DB_USER' => getenv('DB_USER'),
            'DB_PASS' => getenv('DB_PASS'),
            'DB_NAME' => getenv('DB_NAME'),
        ];

        
    }

    // Método para acessar uma configuração específica
    public function get($key)
    {
        if (isset($this->config[$key])) {
            return $this->config[$key];
        }

        throw new \Exception("Config key '$key' not found.");
    }

    // Método para verificar se a chave existe na configuração
    public function has($key)
    {
        return isset($this->config[$key]);
    }
}
