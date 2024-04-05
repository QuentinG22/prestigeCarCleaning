<?php

namespace PrestigeCarCleaning\Models;

use Exception;

class Contacts extends Sql
{
    public function __construct()
    {
        $this->table = 'CONTACTS';
    }

    public function getContactById($id)
    {
        return $this->getById('idContact', $id);
    }

    public function getContactAll()
    {
        return $this->getAll();
    }

    public function addContact($name, $firstname,  $email, $object, $text, $userId)
    {
            // Création du modèle de données
            $model = [
                'name' => htmlspecialchars($name),
                'firstname' => htmlspecialchars($firstname),
                'email' => htmlspecialchars($email),
                'object' => htmlspecialchars($object),
                'text' => htmlspecialchars($text),
                'idUser' => $userId
            ];
    
            return $this->add($model);
    }

    public function deleteContact($id)
    {
            return $this->delete('idContact', $id);
    }
}
