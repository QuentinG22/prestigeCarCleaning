<?php

namespace PrestigeCarCleaning\Router;

use PrestigeCarCleaning\Controllers\FrontOffice\Home;

class Route
{
    public function route($url)
    {
        // Nettoyer l'URL en enlevant le / du début et de la fin de l'url
        $url = trim($url, '/');
        // Diviser l'URL en parties (par exemple, '/accueil' devient ['accueil'])
        $urlParts = explode('/', $url);

        // Vérifier le statut d'administration avant le switch
        // if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin'] === 1) {
        //     switch ($urlParts[0]) {
        //         case 'admin':
        //             if (isset($urlParts[1])) {
        //                 if ($urlParts[1] === 'tableau-de-bord') {
        //                     $controller = new Dashboard();
        //                     if (isset($urlParts[2]) && strpos($urlParts[2], "contact-") === 0) {
        //                         // Extraire l'ID de la demande de contact de l'URL
        //                         $id = substr($urlParts[2], strlen("contact-"));
        //                         if (isset($urlParts[3]) && $urlParts[3] === 'delete') {
        //                             $controller->deleteContact($id);
        //                         } else {
        //                             $controller->getContact($id);
        //                         }
        //                     } else {
        //                         $controller->getContactsAll();
        //                         $controller->index();
        //                     }
        //                 }
        //                 if ($urlParts[1] === 'gestion-des-prestations') {
        //                     $controller = new Service();
        //                     if (isset($urlParts[2]) && strpos($urlParts[2], "prestation-") === 0) {
        //                         // Extraire l'ID de la demande de contact de l'URL
        //                         $id = substr($urlParts[2], strlen("prestation-"));
        //                         if (isset($urlParts[3]) && $urlParts[3] === 'update') {
        //                             $controller->updateService($id);
        //                         } else if (isset($urlParts[3]) && $urlParts[3] === 'delete') {
        //                             $controller->deleteService($id);
        //                         } else {
        //                             $controller->getService($id);
        //                         }
        //                     } else {
        //                         // $controller->getServicesAll();
        //                         $controller->index();
        //                     }
        //                 }
        //             } else {
        //                 $controller = new Admin();
        //                 $controller->index();
        //             }
        //             return;
        //     }
        // }

        // Déterminer quelle action/contrôleur appeler en fonction de l'URL
        switch ($urlParts[0]) {
            case '':
            case '/':
            case 'accueil':
                $controller = new Home();
                $controller->index();
                break;
            // case 'prestations':
            //     $controller = new Services();
            //     $controller->index();
            //     break;
            // case 'avis':
            //     $controller = new Comments();
            //     $controller->index();
            //     break;
            // case 'contact':
            //     $controller = new Contact();
            //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //         $controller->send();
            //     } else {
            //         $controller->index();
            //     }
            //     break;
            // case 'connexion':
            //     $controller = new Login();
            //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //         $controller->login();
            //     } else {
            //         $controller->index();
            //     }
            //     break;
            // case 'inscription':
            //     $controller = new Register();
            //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //         $controller->register();
            //     } else {
            //         $controller->index();
            //     }
            //     break;
            // case 'déconnexion':
            //     $controller = new Logout();
            //     $controller->index();
            //     break;
            // default:
            //     // Rediriger vers une page d'erreur 404
            //     http_response_code(404);
            //     $controller = new Error();
            //     $controller->index404();
            //     break;
        }
    }
}
