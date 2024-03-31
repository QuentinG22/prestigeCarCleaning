<?php

namespace PrestigeCarCleaning\Controllers\FrontOffice;

class LegalNotice
{
    public function index()
    {
        $title = "Mentions légales - Prestige Car Cleaning";
        require "app/Views/frontOffice/legalNotice.php";
    }
}