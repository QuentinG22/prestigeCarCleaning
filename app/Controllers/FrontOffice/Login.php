<?php

namespace PrestigeCarCleaning\Controllers\FrontOffice;

use PrestigeCarCleaning\Models\Users;
use PrestigeCarCleaning\Controllers\ViewManager;

class Login
{
    public function index()
    {
        $title = "Connectez-vous - Prestige Car Cleaning";
        ViewManager::render('frontOffice/login', ['title' => $title]);
    }

    public function login()
    {
        // Connexion
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST["password"];

                $user = new Users();
                $isLogged = $user->login($email, $password);
                if (is_object($isLogged)) {
                    // Stockage des informations de l'utilisateur dans la session
                    $_SESSION['actif'] = 'yes';
                    $_SESSION['userId'] = $isLogged->idUser;
                    $_SESSION['userName'] = $isLogged->name;
                    $_SESSION['userFirstname'] = $isLogged->firstname;
                    $_SESSION['userEmail'] = $isLogged->email;
                    $_SESSION['userIsAdmin'] = $isLogged->isAdmin;
                    // Redirection en fonction du statut d'administrateur
                    if ($_SESSION['userIsAdmin'] == 1) {
                        // Redirection vers la page d'administration
                        $title = "Administration - Prestige Car Cleaning";
                        ViewManager::render('backOffice/home', ['title' => $title]);
                        exit();
                    } else {
                        // Redirection vers la page d'accueil si l'utilisateur n'est pas administrateur
                        $title = "Accueil - Prestige Car Cleaning";
                        ViewManager::render('frontOffice/home', ['title' => $title]);
                    }
                } else {
                    $title = "Connectez-vous - Prestige Car Cleaning";
                    $error = $isLogged;
                    ViewManager::render('frontOffice/login', ['title' => $title, 'error' => $error]);
                }
            } else {
                $title = "Connectez-vous - Prestige Car Cleaning";
                $error = "Tous les champs n'ont pas été saisis !";
                ViewManager::render('frontOffice/login', ['title' => $title, 'error' => $error]);
            }
        }
    }
}
