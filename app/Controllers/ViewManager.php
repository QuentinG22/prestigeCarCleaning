<?php

namespace PrestigeCarCleaning\Controllers;

class ViewManager
{
    public static function render($view, $data = [])
    {
        extract($data);
        require "app/Views/$view.php";
    }
}