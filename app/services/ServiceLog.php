<?php

namespace app\Services;

class ApiLogger
{
    private string $logFile;

    public function __construct(string $logFileName = 'api_logs.txt')
    {
        // Define o caminho do diretório de logs baseado no diretório atual
        $logDirectory = BASE_URL . '/logs';
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
