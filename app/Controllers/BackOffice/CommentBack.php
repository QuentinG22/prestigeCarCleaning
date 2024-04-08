<?php

namespace PrestigeCarCleaning\Controllers\BackOffice;

use PrestigeCarCleaning\Controllers\ViewManager;
use PrestigeCarCleaning\Models\Comments;

class CommentBack
{
    public function index()
    {
        $title = "Modération des avis - Prestige Car Cleaning";
        $model = new Comments;
        $commentsAll = $model->getCommentsAll();
        return ViewManager::render('backOffice/comment', ['title' => $title, 'commentsAll' => $commentsAll,]);
    }

    public function actifComment()
    {
        $id = $_POST['idComment'];
        $model = new Comments;
        $result = $model->actifComment($id);

        if ($result === false) {
            $error = "L'activation de l'avis à échoué.";
            $success = '';
        } else {
            $success = "Avis activer avec succès.";
            $error = '';
        }

        $title = "Modération des avis - Prestige Car Cleaning";
        $model = new Comments;
        $commentsAll = $model->getCommentsAll();
        return ViewManager::render('backOffice/comment', ['title' => $title, 'commentsAll' => $commentsAll, 'error' => $error, 'success' => $success]);
    }

    public function deleteComment()
    {
        $id = $_POST['idComment'];
        $model = new Comments;
        $result = $model->actifComment($id);

        if ($result === false) {
            $error = "La suppresion de l'avis à échoué.";
            $success = '';
        } else {
            $success = "Avis supprimer avec succès.";
            $error = '';
        }

        $title = "Modération des avis - Prestige Car Cleaning";
        $model = new Comments;
        $commentsNotActif = $model->getCommentsAll();
        return ViewManager::render('backOffice/comment', ['title' => $title, 'commentsNotActif' => $commentsNotActif, 'error' => $error, 'success' => $success]);
    }
}