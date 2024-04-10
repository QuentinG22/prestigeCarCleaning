<?php

namespace PrestigeCarCleaning\Models;

use Exception;

class Contacts extends Sql
{
    public function __construct()
    {
        $this->table = 'CONTACTS';
    }

    public function getContactAll()
    {
        $contacts = $this->getAll();

        foreach ($contacts as $contact) {
            // Formater la date au format français
            $contact->_date = date('d/m/Y', strtotime($contact->_date));
        }

        return $contacts;
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
