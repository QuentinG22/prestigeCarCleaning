<?php

namespace PrestigeCarCleaning\Controllers\FrontOffice;

use PrestigeCarCleaning\Models\Users;
use PrestigeCarCleaning\Controllers\ViewManager;

class Register
{
    public function index()
    {
        $title = "Inscrivez-vous - Prestige Car Cleaning";
        ViewManager::render('frontOffice/register', ['title' => $title]);
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
            
            $name = $_POST["name"];
            $firstname = $_POST["firstname"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            // Créer une instance utilisateur avec les données
            $user = new Users();

            // Appeler la méthode pour enregistrer l'utilisateur
            $result = $user->addUser($name, $firstname, $email, $phone, $password, 0);

            if ($result !== false && $result !== true){
                $title = "Inscrivez-vous - Prestige Car Cleaning";
                $error = $result;
                ViewManager::render('frontOffice/register', ['title' => $title, 'error' => $error]);
            } else if ($result === false) {
                // Si une erreur s'est produite lors de l'enregistrement, afficher le message d'erreur
                $title = "Inscrivez-vous - Prestige Car Cleaning";
                $error = "L'inscription à échoué.";
                ViewManager::render('frontOffice/register', ['title' => $title, 'error' => $error]);
            } else if ($result === true) {
                // Rediriger vers la page de connexion si l'enregistrement est réussi
                header('Location: connexion');
            }
        }
    }
}
