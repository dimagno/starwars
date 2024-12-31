<?php

namespace app\Database;

use PDO;
use PDOException;
use app\Config\Config;

class Connection
{
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $pdo;
    private $config ;

    // Construtor que recebe as configurações de conexão
    public function __construct()
    {
        $this->config = new Config();
        $this->host = $this->config->get('DB_HOST');
        $this->dbname = $this->config->get('DB_NAME');
        $this->username = $this->config->get('DB_USER');
        $this->password = $this->config->get('DB_PASS');
    }

    // Método para estabelecer a conexão com o banco de dados
    public function connect()
    {
        if ($this->pdo === null) {
            try {
                $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
                $this->pdo = new PDO($dsn, $this->username, $this->password);
                // Configuração de erros
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
            } catch (PDOException $e) {
                echo "Erro ao conectar: " . $e->getMessage();
                
                // Pode-se lançar a exceção aqui ou registrar o erro em um log
            }
        }

        return $this->pdo;
    }

    // Método para fechar a conexão
    public function disconnect()
    {
        $this->pdo = null;
    }

    // Método para executar uma consulta (select)
    public function query($sql, $params = [])
    {
        try {
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro na consulta: " . $e->getMessage();
            return false;
        }
    }

    // Método para executar um comando (insert, update, delete)
    public function execute($sql, $params = [])
    {
        try {
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            echo "Erro na execução: " . $e->getMessage();
            return false;
        }
    }

    // Método para obter o último ID inserido
    public function lastInsertId()
    {
        return $this->connect()->lastInsertId();
    }
}
