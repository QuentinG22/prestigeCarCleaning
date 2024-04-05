<?php

namespace PrestigeCarCleaning\Controllers\FrontOffice;

use PrestigeCarCleaning\Models\Services;
use PrestigeCarCleaning\Models\Comments;
use PrestigeCarCleaning\Controllers\ViewManager;

class Comment
{
    public function index()
    {
        $title = "Nos avis - Prestige Car Cleaning";
        // Récupérer les services depuis le modèle
        $servicesModel = new Services();
        $servicesAll = $servicesModel->getAll();

        $model = new Comments;
        $commentsAll = $model->getCommentsAll();
        return ViewManager::render('frontOffice/comments', ['title' => $title, 'servicesAll' => $servicesAll , 'commentsAll' => $commentsAll]);
    }

    public function addComments()
    {
        $text = $_POST["text"];
        $note = $_POST["note"];
        $serviceId = $_POST["service"];
        $userId = $_SESSION['userId'];

        $model = new Comments();
        $result = $model->addComment($text, $note, $serviceId, $userId);

        if ($result === false) {
            $error = "La création de l'avis à échoué.";
            $success = '';
        } else {
            $success = "L'avis a bien été envoyer a l'administrateur pour une validation.";
            $error = '';
        }

        $title = "Nos avis - Prestige Car Cleaning";
        // Récupérer les services depuis le modèle
        $servicesModel = new Services();
        $servicesAll = $servicesModel->getAll();
        return ViewManager::render('frontOffice/comments', ['title' => $title, 'servicesAll' => $servicesAll, 'error' => $error, 'success' => $success]);
    }
}
