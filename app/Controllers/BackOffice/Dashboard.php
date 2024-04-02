<?php

namespace PrestigeCarCleaning\Controllers\BackOffice;

use PrestigeCarCleaning\Models\Contacts;

class Dashboard
{
    private $jsonContact;
    private $contactAll;

    public function index()
    {
        $error = '';
        $sucess = '';
        $title = "Tableau de bord - Prestige Car Cleaning";
        require "app/Views/backOffice/dashboard.php";
    }

    public function getContact($id)
    {
        $error = '';
        $sucess = '';
        $contactModel = new Contacts();
        $contact = $contactModel->getContactById($id);
        $jsonContact = json_encode($contact);
        // Envoyer la réponse JSON
        header('Content-Type: application/json');
        echo $jsonContact;
        exit();
    }

    public function getContactsAll()
    {
        $error = '';
        $sucess = '';
        $contactModel = new Contacts('', '', '', '', '', '');
        $this->contactAll = $contactModel->getAll();
    }

    public function deleteContact($id)
    {
        $error = '';
        $success = '';
        $contactModel = new Contacts('', '', '', '', '', '');
        return $contactModel->deleteContact($id);
    }
}
