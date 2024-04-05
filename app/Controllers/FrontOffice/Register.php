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
            
            $name = htmlspecialchars($_POST["name"]);
            $firstname = htmlspecialchars($_POST["firstname"]);
            $phone = htmlspecialchars($_POST["phone"]);
            $email = htmlspecialchars($_POST["email"]);
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

            // Créer une instance utilisateur avec les données
            $user = new Users();

            // Appeler la méthode pour enregistrer l'utilisateur
            $result = $user->addUser($name, $firstname, $email, $phone, $password, 0);

            if ($result === false) {
                // Si une erreur s'est produite lors de l'enregistrement, afficher le message d'erreur
                $title = "Inscrivez-vous - Prestige Car Cleaning";
                $error = "L'inscription à échoué.";
                ViewManager::render('frontOffice/register', ['title' => $title, 'error' => $error]);
            } else {
                // Rediriger vers la page de connexion si l'enregistrement est réussi
                $title = "Inscrivez-vous - Prestige Car Cleaning";
                $success = "Inscription réussi, connectez-vous.";
                ViewManager::render('frontOffice/login', ['title' => $title, 'success' => $success]);
            }
        }
    }
}
