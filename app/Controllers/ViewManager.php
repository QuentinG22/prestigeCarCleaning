<?php

namespace PrestigeCarCleaning\Controllers;

class ViewManager
{
    public static function render($view, $data = [])
    {
        extract($data);
        require "app/Views/$view.php";
    }

    public static function renderJson($data = [])
    {
        $json = json_encode($data);
        // Envoyer la réponse JSON
        header('Content-Type: application/json');
        echo $json;
        exit();
    }
}