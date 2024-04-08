<?php
session_start();

// Activer l'affichage des erreurs
// ini_set('display_errors', 1);

// Définir le niveau de rapport d'erreurs pour afficher tous les types d'erreurs
// error_reporting(E_ALL);

use Dotenv\Dotenv;
use PrestigeCarCleaning\Router\Route;

require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Récupérer l'URL demandée
$url = isset($_GET['url']) ? $_GET['url'] : '';

// Créer une instance de routeur
$router = new Route();
$router->route($url);
