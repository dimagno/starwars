<?php

namespace app\Services;
use app\Database\Connection;
class ServiceLog
{
    private string $logFile;
    private $conection;

    public function __construct(string $logFileName = 'api_logs.txt')
    {
        // Define o caminho do diretório de logs baseado no diretório atual
        $logDirectory = __DIR__ . '/../../logs';
        $this->conection= new Connection();
        // Garante que o diretório exista
        if (!is_dir($logDirectory)) {
            mkdir($logDirectory, 0755, true);
        }

        // Define o caminho completo do arquivo de log
        $this->logFile = $logDirectory . '/' . $logFileName;
    }

    public function logRequest(string $statusCode, string $message, string $level = 'INFO'): void
    {
        $timestamp = date('Y-m-d H:i:s');
        $logEntry = "[$timestamp] [$level] Status: $statusCode - $message" . PHP_EOL;

        file_put_contents($this->logFile, $logEntry, FILE_APPEND);
    }

    public function getLogs(string $level = null): array
    {
        $logs = file($this->logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if ($level) {
            $logs = array_filter($logs, function ($log) use ($level) {
                return str_contains($log, "[$level]");
            });
        }

        return $logs;
    }

    public function clearLogs(): void
    {
        file_put_contents($this->logFile, '');
    }
}
