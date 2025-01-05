<?php

namespace app\Config;

class Config
{
    private $config;

    public function __construct()
    {
        // Carrega as variáveis de ambiente
        $this->loadEnv(__DIR__ . '/../../.env');
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
    private function loadEnv($filePath)
{
    if (!file_exists($filePath)) {
        throw new \Exception("Arquivo .env não encontrado.");
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue; // Ignora comentários
        }

        list($key, $value) = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);

        if (!array_key_exists($key, $_ENV)) {
            putenv("$key=$value");
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }
    }
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
