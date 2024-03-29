<?php
session_start();

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