<?php

namespace PrestigeCarCleaning\Controllers\FrontOffice;

use PrestigeCarCleaning\Models\Services;

class Comments
{
    public function index()
    {
        $title = "Nos avis - Prestige Car Cleaning";
        // Récupérer les services depuis le modèle
        $servicesModel = new Services();
        $servicesAll = $servicesModel->getAll();
        require "app/Views/frontOffice/comments.php";
    }
}
