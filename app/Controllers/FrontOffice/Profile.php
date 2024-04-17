<?php

namespace PrestigeCarCleaning\Controllers\FrontOffice;

use PrestigeCarCleaning\Models\Users;
use PrestigeCarCleaning\Controllers\ViewManager;

class Profile
{
    public function index()
    {
        $title = "Connectez-vous - Prestige Car Cleaning";
        $model = new Users();
        $user = $model->getUser($_SESSION['userEmail']);

        return ViewManager::render('frontOffice/profile', ['title' => $title, 'user' => $user]);
    }

    public function updateUser()
    {
        $id = $_SESSION["userId"];
        $data = [];

        if (!empty($_POST['email'])) {
            $data['email'] = htmlspecialchars($_POST['email']);
        }

        if (!empty($_POST['phone'])) {
            $data['phone'] = $_POST['phone'];
        } 

        if (!empty($_POST['newPassword'])) {
            $data['ancientPassword'] = $_POST['password'];
            $data['password'] = $_POST['newPassword'];
        }

        // Créer une instance utilisateur avec les données
        $model = new Users();
        $result = $model->updateUser($id, $data);
        if ($result !== false && $result !== true) {
            $error = $result;
            $success = ''; 
        } else if ($result === false) {
            $error = 'La modification de votre profil a échoué.';
            $success = '';
        } else {
            // Mettre à jour la session avec le nouvel email si celui-ci a été modifié
            if (!empty($data['email']) && $data['email'] !== $_SESSION['userEmail']) {
                $_SESSION['userEmail'] = $data['email'];
            }
            $error = '';
            $success = 'Le profil a bien été modifié.';
        }

        $user = $model->getUser($_SESSION['userEmail']);

        $title = "Mon profil - Prestige Car Cleaning";
        return ViewManager::render('frontOffice/profile', ['title' => $title, 'user' => $user, 'error' => $error, 'success' => $success]);
    }

    public function deleteUser()
    {
        $id = $_SESSION["userId"];

        // Créer une instance utilisateur avec les données
        $model = new Users();
        $result = $model->deleteUser($id);

        if ($result === false) {
            $title = "Mon profil - Prestige Car Cleaning";
            $error = 'La suppression du compte a échoué.';
            return ViewManager::render('frontOffice/profile', ['title' => $title, 'error' => $error]);
        } else {
            $_SESSION['actif'] = 'no';
            session_destroy();
            $title = "Mon profil - Prestige Car Cleaning";
            $success = 'Votre compte à bien été supprimé.';
            return ViewManager::render('frontOffice/profile', ['title' => $title, 'success' => $success]);
        }
    }
}
