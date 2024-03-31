<?php

namespace PrestigeCarCleaning\Controllers;

class Error
{
    public function index()
    {
        $title = "Erreur - Prestige Car Cleaning";
        require "app/Views/common/error.php";
    }
}