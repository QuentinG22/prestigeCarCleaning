<?php

namespace PrestigeCarCleaning\Controllers\FrontOffice;

use PrestigeCarCleaning\Controllers\ViewManager;
use PrestigeCarCleaning\Models\Services;

class Service
{
    public function index()
    {
        $title = "Nos prestations - Prestige Car Cleaning";
        $model = new Services;
        $servicesAll = $model->getServiceAll();
        return ViewManager::render('frontOffice/services', ['title' => $title, 'servicesAll' => $servicesAll,]);
    }
}