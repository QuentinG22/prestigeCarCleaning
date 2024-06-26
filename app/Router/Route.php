<?php

namespace PrestigeCarCleaning\Router;

use PrestigeCarCleaning\Controllers\BackOffice\Admin;
use PrestigeCarCleaning\Controllers\BackOffice\Dashboard;
use PrestigeCarCleaning\Controllers\BackOffice\ServiceBack;
use PrestigeCarCleaning\Controllers\BackOffice\Product;
use PrestigeCarCleaning\Controllers\BackOffice\CommentBack;

use PrestigeCarCleaning\Controllers\FrontOffice\Home;
use PrestigeCarCleaning\Controllers\FrontOffice\Service;
use PrestigeCarCleaning\Controllers\FrontOffice\Comment;
use PrestigeCarCleaning\Controllers\FrontOffice\Contact;
use PrestigeCarCleaning\Controllers\FrontOffice\Login;
use PrestigeCarCleaning\Controllers\FrontOffice\Register;
use PrestigeCarCleaning\Controllers\FrontOffice\Profile;
use PrestigeCarCleaning\Controllers\FrontOffice\Logout;

use PrestigeCarCleaning\Controllers\Error;
use PrestigeCarCleaning\Controllers\FrontOffice\LegalNotice;
use PrestigeCarCleaning\Controllers\FrontOffice\PrivacyPolicy;

class Route
{
    public function route($url)
    {
        // Nettoyer l'URL en enlevant le / du début et de la fin de l'url
        $url = trim($url, '/');
        // Diviser l'URL en parties (par exemple, '/accueil' devient ['accueil'])
        $urlParts = explode('/', $url);

        // Vérifier le statut d'administration avant le switch
        if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin'] == 1) {
            switch ($urlParts[0]) {
                case 'admin':
                    if (isset($urlParts[1])) {
                        if ($urlParts[1] === 'tableau-de-bord') {
                            $controller = new Dashboard();
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteContact'])) {
                                $controller->deleteContact();
                            } else {
                                $controller->index();
                            }
                        } else if ($urlParts[1] === 'gestion-des-prestations') {
                            $controller = new ServiceBack();
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addService'])) {
                                $controller->addService();
                            } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateService'])) {
                                $controller->updateService();
                            } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteService'])) {
                                $controller->deleteService();
                            } else {
                                $controller->index();
                            }
                        } else if ($urlParts[1] === 'service') {
                            $controller = new ServiceBack();
                            if (is_numeric($urlParts[2])) {
                                $controller->fetchServiceDetails($urlParts[2]);
                            }
                        } else if ($urlParts[1] === 'gestion-des-produits') {
                            $controller = new Product();
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addProduct'])) {
                                $controller->addProduct();
                            } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateProduct'])) {
                                $controller->updateProduct();
                            } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteProduct'])) {
                                $controller->deleteProduct();
                            } else {
                                $controller->index();
                            }
                        } else if ($urlParts[1] === 'modération-avis') {
                            $controller = new CommentBack();
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['actifComment'])) {
                                $controller->actifComment();
                            } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteComment'])) {
                                $controller->deleteComment();
                            } else {
                                $controller->index();
                            }
                        }
                    } else {
                        $controller = new Admin();
                        $controller->index();
                    }
                    return;
            }
        }

        // Déterminer quelle action/contrôleur appeler en fonction de l'URL
        switch ($urlParts[0]) {
            case '':
            case '/':
            case 'accueil':
                $controller = new Home();
                $controller->index();
                break;
            case 'nos-prestations':
                if (isset($urlParts[1]) && $urlParts[1] === 'service') {
                    $controller = new ServiceBack();
                    if (is_numeric($urlParts[2])) {
                        $controller->fetchServiceDetails($urlParts[2]);
                    }
                } else {
                    $controller = new Service();
                    $controller->index();
                    break;
                }
            case 'nos-avis':
                $controller = new Comment();
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addComment'])) {
                    $controller->addComments();
                } else {
                    $controller->index();
                }
                break;
            case 'contact':
                $controller = new Contact();
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $controller->send();
                } else {
                    $controller->index();
                }
                break;
            case 'connexion':
                $controller = new Login();
                if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['login']) {
                    $controller->login();
                } else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['register']) {
                    header('location: inscription');
                } else {
                    $controller->index();
                }
                break;
            case 'inscription':
                $controller = new Register();
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $controller->register();
                } else {
                    $controller->index();
                }
                break;
            case 'profil':
                $controller = new Profile();
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateUser'])) {
                    $controller->updateUser();
                } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteUser'])){
                    $controller->deleteUser();
                } else {
                    $controller->index();
                }
                break;
            case 'déconnexion':
                $controller = new Logout();
                $controller->index();
                break;
            case 'mentions-légales':
                $controller = new LegalNotice();
                $controller->index();
                break;
            case 'politique-de-confidentialité':
                $controller = new PrivacyPolicy();
                $controller->index();
                break;
            default:
                // Rediriger vers une page d'erreur 404
                http_response_code(404);
                $controller = new Error();
                $controller->index();
                break;
        }
    }
}
