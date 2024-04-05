<?php

namespace PrestigeCarCleaning\Controllers\BackOffice;
use PrestigeCarCleaning\Controllers\ViewManager;

class Admin
{

    public function index()
    {
        $title = "Administration - Prestige Car Cleaning";
        return ViewManager::render('backOffice/home', ['title' => $title]);
    }
}