<?php

namespace PrestigeCarCleaning\Controllers\FrontOffice;

use PrestigeCarCleaning\Models\Contacts;
use PrestigeCarCleaning\Controllers\ViewManager;

class Contact
{
    public function index()
    {
        $title = "Contactez-nous - Prestige Car Cleaning";
        ViewManager::render('frontOffice/contact', ['title' => $title]);
    }

    public function send()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["contact"])) {

            $name = $_POST["name"];
            $firstname = $_POST["firstname"];
            $email = $_POST["email"];
            $object = $_POST["object"];
            $text = $_POST["text"];
            if (isset($_SESSION['actif']) && isset($_SESSION['userId'])) {
                $userId = $_SESSION['userId'];
            } else {
                $userId = null;
            }

            // Créer une instance utilisateur avec les données
            $contact = new Contacts();
            $result = $contact->addContact($name, $firstname, $email, $object, $text, $userId);

            if ($result === false) {
                $error = 'La demande de contact a échoué.';
                $success = '';
            } else {
                $success = 'Votre demande de contact a bien été envoyée.';
                $error = '';
            }

            // Passer les messages d'erreur et de succès à la vue en utilisant la méthode statique de ViewManager
            $title = "Contactez-nous - Prestige Car Cleaning";
            return ViewManager::render('frontOffice/contact', ['title' => $title, 'error' => $error, 'success' => $success]);
        }
    }
}
