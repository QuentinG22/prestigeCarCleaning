<?php

namespace PrestigeCarCleaning\Models;

use Exception;

class Contacts extends Sql
{
    public function __construct()
    {
        $this->table = 'contacts';
    }

    public function getContactById($id)
    {
        $result = $this->getById($id);

        try {
            if (!$result) {
                throw new Exception("La demande de contact avec l'ID : $id, n'existe pas.");
            } else {
                return $result;
            }
        } catch (Exception $e) {
            // Enregistrement dans le fichier de journal
            $logMessage = "Date : " . date('d-m-Y H:i:s') . " - Erreur : " . $e->getMessage() . "\n";
            error_log($logMessage, 3, "logs/error.log");
            return "Une erreur est survenue lors de la récupération de la demande de contact";
        }
    }

    public function getContactAll()
    {
        $result = $this->getAll();

        try {
            if (!$result) {
                throw new Exception("Aucune demande de contact trouver dans la base de donnée.");
            } else {
                return $result;
            }
        } catch (Exception $e) {
            // Enregistrement dans le fichier de journal
            $logMessage = "Date : " . date('d-m-Y H:i:s') . " - Erreur : " . $e->getMessage() . "\n";
            error_log($logMessage, 3, "logs/error.log");
            return "Une erreur est survenue lors de la récupération des demande de contact";
        }
    }

    public function addContact($name, $firstname,  $email, $object, $text, $date, $userId)
    {
        try {
            // Création du modèle de données
            $model = [
                'name' => $name,
                'firstname' => $firstname,
                'email' => $email,
                'object' => $object,
                'text' => $text,
                '_date' => $date,
                'idUser' => $userId
            ];
    
            $result = $this->add($model);

            if ($result === false) {
                throw new Exception("Échec lors de l'ajout du contact.");
            } else {
                return true;
            }
        } catch (Exception $e) {
            // Enregistrement dans le fichier de journal
            $logMessage = "Date : " . date('d-m-Y H:i:s') . " - Erreur : " . $e->getMessage() . "\n";
            error_log($logMessage, 3, "logs/error.log");
            return false;
        }
    }

    public function deleteContact($id)
    {
        try {
            $result = $this->delete($id);

            if (!$result) {
                throw new Exception("Échec lors de la suppresion.");
            } else {
                return true;
            }
        } catch (\Exception $e) {
            // Enregistrement dans le fichier de journal
            $logMessage = "Date : " . date('d-m-Y H:i:s') . " - Erreur : " . $e->getMessage() . "\n";
            error_log($logMessage, 3, "logs/error.log");
            return false;
        }
    }
}
