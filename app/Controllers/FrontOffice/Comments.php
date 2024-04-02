<?php

namespace PrestigeCarCleaning\Controllers\FrontOffice;

class Comments 
{
    public function index()
    {
        $title = "Nos avis - Prestige Car Cleaning";
        require "app/Views/frontOffice/comments.php";
    }
}