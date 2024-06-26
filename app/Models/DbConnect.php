<?php

namespace PrestigeCarCleaning\Models;

use PDO;
use PDOException;

class DbConnect
{
    // Variable statique pour stocker la connexion PDO une fois établie
    protected static $pdo;

    protected function connection()
    {
        // Vérifie si la connexion PDO a déjà été établie
        if (!isset(self::$pdo)) {
            try {
                $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'];
                $pdo = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // Stocke la connexion PDO dans la variable statique
                self::$pdo = $pdo;
            } catch (PDOException $e) {
                // Enregistrement dans le fichier de journal
                $logMessage = "Date : " . date('Y-m-d H:i:s') . " - Erreur PDO : " . $e->getMessage() . "\n";
                error_log($logMessage, 3, "logs/error.log");
                // Retourne une erreur en cas d'échec de connexion
                $title = 'Erreur - Prestige Car Cleaning';
                require "app/Views/common/errorDb.php";
                exit;
            }
        }
        // Retourne la connexion PDO stockée
        return self::$pdo;
    }
}