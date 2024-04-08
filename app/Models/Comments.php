<?php

namespace PrestigeCarCleaning\Models;

use PDO;

class Comments extends Sql
{
    public function __construct()
    {
        $this->table = 'COMMENTS';
    }

    public function getCommentsAll()
    {
        $sql = "SELECT COMMENTS.idComment, COMMENTS.text, COMMENTS.note, COMMENTS._date, 
        COMMENTS.active, SERVICES.nameService, USERS.name, USERS.firstname
        FROM COMMENTS
        JOIN SERVICES ON COMMENTS.idService = COMMENTS.idService
        JOIN USERS ON COMMENTS.idUser = USERS.idUser";

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
