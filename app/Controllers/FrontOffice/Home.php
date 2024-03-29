<?php

namespace PrestigeCarCleaning\Controllers\FrontOffice;

class Home 
{
    public function index()
    {
        $title = "Prestige Car Cleaning";
        require "app/Views/frontOffice/home.php";
    }
}