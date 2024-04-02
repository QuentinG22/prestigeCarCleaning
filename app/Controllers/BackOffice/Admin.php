<?php

namespace PrestigeCarCleaning\Controllers\BackOffice;

class Admin
{

    public function index()
    {
        $title = "Administration - Prestige Car Cleaning";
        require "app/Views/backOffice/home.php";
    }
}