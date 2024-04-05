<?php

namespace PrestigeCarCleaning\Models;

use PDO;

class Comments extends Sql
{
    public function __construct()
    {
        $this->table = 'comments';
    }

    public function getCommentsAll()
    {
        $sql = "SELECT comments.idComment, comments.text, comments.note, comments._date, 
        comments.active, services.nameService, users.name, users.firstname
        FROM comments
        JOIN services ON comments.idService = services.idService
        JOIN users ON comments.idUser = users.idUser";

        return $this->requete($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    public function addComment($text, $note, $serviceId, $userId)
    {
        $model = [
            'text' => htmlspecialchars($text),
            'note' => htmlspecialchars($note),
            'idService' => $serviceId,
            'idUser' => $userId,
        ];

        return $this->add($model);
    }

    public function actifComment($id)
    {
        return $this->update('idComment', $id, ['active' => 1]);
    }

    public function deleteComment($id)
    {
        return $this->delete('idComment', $id);
    }
}
