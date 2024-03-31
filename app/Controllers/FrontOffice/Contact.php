<?php

namespace PrestigeCarCleaning\Controllers\FrontOffice;

use PrestigeCarCleaning\Models\Contacts;
use PrestigeCarCleaning\Views\ViewManager;

class Contact
{
    public function index()
    {
        $title = "Contactez-nous - Prestige Car Cleaning";
        ViewManager::render('frontOffice/contact', ['title' => $title]);
    }

    public function view($data = [])
    {
        extract($data);
        require "app/Views/frontOffice/contact.php";
    }

    public function send()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["contact"])) {

            $name = htmlspecialchars($_POST["name"]);
            $firstname = htmlspecialchars($_POST["firstname"]);
            $email = htmlspecialchars($_POST["email"]);
            $object = htmlspecialchars($_POST["object"]);
            $text = htmlspecialchars($_POST["text"]);
            $date = htmlspecialchars($_POST["date"]);
            if (isset($_SESSION['actif']) && isset($_SESSION['userId'])) {
                $userId = $_SESSION['userId'];
            } else {
                $userId = null;
            }

            // Créer une instance utilisateur avec les données
            $contact = new Contacts();

            // Appeler la méthode pour enregistrer l'utilisateur
            $isContact = $contact->addContact($name, $firstname, $email, $object, $text, $date, $userId);

            if ($isContact === true) {
                $success = 'Votre demande de contact a bien été envoyée.';
                $error = '';
            } else {
                $error = 'La demande de contact a échoué.';
                $success = '';
            }

            // Passer les messages d'erreur et de succès à la vue en utilisant la méthode statique de ViewManager
            $title = "Contactez-nous - Prestige Car Cleaning";
            return ViewManager::render('frontOffice/contact', ['title' => $title, 'error' => $error, 'success' => $success]);
        }
    }
}
