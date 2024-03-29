<?php

namespace PrestigeCarCleaning\Controllers\FrontOffice;

use app\Models\Contacts;

class Contact
{
    public function index()
    {
        $title = "Contactez-nous - Prestige Car Cleaning";
        require "app/Views/frontOffice/contact.php";
    }

    // public function send()
    // {
    //     $error = '';
    //     $success = '';
    //     if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["contact"])) {
            
    //         $name = htmlspecialchars($_POST["name"]);
    //         $firstname = htmlspecialchars($_POST["firstname"]);
    //         $email = htmlspecialchars($_POST["email"]);
    //         $object = htmlspecialchars($_POST["object"]);
    //         $text = htmlspecialchars($_POST["text"]);
    //         $date = htmlspecialchars($_POST["date"]);
    //         if (isset($_SESSION['actif']) && isset($_SESSION['userId'])){
    //             $userId = $_SESSION['userId'];
    //         } else {
    //             $userId = null;
    //         }

    //         // Créer une instance utilisateur avec les données
    //         $contact = new Contacts();

    //         // Appeler la méthode pour enregistrer l'utilisateur
    //         $isContact = $contact->setContact($name, $firstname, $email, $object, $text, $date, $userId);

    //         if ($isContact === 'Votre demande de contact à bien été envoyer.') {
    //             $title = "Contactez-nous - Prestige Car Cleaning";
    //             $success = $isContact;
    //             require "app/Views/contact.php";
    //         } else {
    //             $title = "Contactez-nous - Prestige Car Cleaning";
    //             $error = $isContact;
    //             require "app/Views/contact.php";
    //         }
    //     }
    // }
}