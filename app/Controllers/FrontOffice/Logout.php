<?php

namespace PrestigeCarCleaning\Controllers\FrontOffice;

class Logout
{
    public function index()
    {
        session_destroy();
        header("Location: accueil");
    }
}