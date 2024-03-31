<?php

namespace PrestigeCarCleaning\Models;

use Dotenv\Dotenv;
use PDO;
use PDOException;

class DbConnect
{
    protected function connection()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
        try {
            $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'];
            $pdo = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            // Enregistrement dans le fichier de journal
            $logMessage = "Date : " . date('Y-m-d H:i:s') . " - Erreur PDO : " . $e->getMessage() . "\n";
            error_log($logMessage, 3, "logs/error.log");
            return "Erreur lors de la connexion a la base de donnée.";
        }
    }
}
