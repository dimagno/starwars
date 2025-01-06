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
    private $env;

    public function __construct()
    {
        $this->env = new Config();
        $this->host = $this->env->get('DB_HOST');
        $this->dbname = $this->env->get('DB_NAME');
        $this->username = $this->env->get('DB_USER');
        $this->password = $this->env->get('DB_PASS');
    }

    public function connect()
    {
        if ($this->pdo === null) {
            try {
                $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
                $this->pdo = new PDO($dsn, $this->username, $this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                throw new PDOException("Erro ao conectar: " . $e->getMessage());
            }
        }

        return $this->pdo;
    }

    public function disconnect()
    {
        $this->pdo = null;
    }

    public function query($sql, $params = [])
    {
        try {
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new PDOException("Erro na consulta: " . $e->getMessage());
        }
    }

    public function execute($sql, $params = [])
    {
        try {
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($params);
            return $stmt->rowCount();  // Retorna o número de linhas afetadas
        } catch (PDOException $e) {
            throw new PDOException("Erro na execução: " . $e->getMessage());
        }
    }

    public function beginTransaction()
    {
        $this->connect()->beginTransaction();
    }

    public function commit()
    {
        $this->connect()->commit();
    }

    public function rollback()
    {
        $this->connect()->rollBack();
    }

    public function lastInsertId()
    {
        return $this->connect()->lastInsertId();
    }
    public function isConnected()
{
    try {
        // Tenta realizar uma consulta simples para verificar a conexão
        $stmt = $this->connect()->query("SELECT 1");
        return $stmt !== false;  // Retorna true se a consulta for bem-sucedida
    } catch (PDOException $e) {
        // Caso haja erro ao tentar consultar, a conexão não está ativa
        return false;
    }
}
}
