<?php

namespace PrestigeCarCleaning\Controllers\FrontOffice;

class PrivacyPolicy 
{
    public function index()
    {
        $title = "Politique de confidentialité - Prestige Car Cleaning";
        require "app/Views/frontOffice/privacyPolicy.php";
    }
}