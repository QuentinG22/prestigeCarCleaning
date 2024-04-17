<?php

namespace PrestigeCarCleaning\Controllers\BackOffice;

use PrestigeCarCleaning\Models\Contacts;
use PrestigeCarCleaning\Controllers\ViewManager;

class Dashboard
{
    public function index()
    {
        $title = "Tableau de bord - Prestige Car Cleaning";
        $contactsAll = $this->getContactsAll();
        return ViewManager::render('backOffice/dashboard', ['title' => $title, 'contactsAll' => $contactsAll]);
    }

    public function getContactsAll()
    {
        $model = new Contacts();
        return $model->getAll();
    }

    public function deleteContact()
    {
        $id = $_POST["selectedContactId"];

        $model = new Contacts();
        $result = $model->deleteContact($id);

        if ($result === false) {
            $error = 'La suppression du contact a échoué.';
            $success = '';
        } else {
            $success = 'le contact a bien été supprimé.';
            $error = '';
        }

        $contactsAll = $this->getContactsAll();

        // Passer les messages d'erreur et de succès à la vue en utilisant la méthode statique de ViewManager
        $title = "Tableau de bord - Prestige Car Cleaning";
        return ViewManager::render('backOffice/dashboard', ['title' => $title, 'contactsAll' => $contactsAll, 'error' => $error, 'success' => $success]);
    }
}
