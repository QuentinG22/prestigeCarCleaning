<?php

namespace PrestigeCarCleaning\Models;

use PDO;
use Exception;

class Users extends Sql
{
    public function __construct()
    {
        $this->table = 'USERS';
    }

    public function login($email, $password)
    {
        $sql = "SELECT idUser, name, firstname, password, email, isAdmin FROM $this->table WHERE email = ?";
        $result = $this->requete($sql, [$email])->fetch(PDO::FETCH_OBJ);
        if ($result !== false){
            if (password_verify($password, $result->password)){
                return $result;
            } else {
                return "Mot de passe incorrect.";
            }
        } else {
            return "Addrese mail incorrect.";
        }
    }

    public function addUser($name, $firstname,  $email, $phone, $password, $isAdmin)
    {
        try {
            // Création du modèle de données
            $model = [
                'name' => $name,
                'firstname' => $firstname,
                'email' => $email,
                'phone' => $phone,
                'password' => $password,
                'isAdmin' => $isAdmin,
            ];

            return $this->add($model);
        } catch (Exception $e) {
            // Enregistrement dans le fichier de journal
            $logMessage = "Date : " . date('d-m-Y H:i:s') . " - Erreur : " . $e->getMessage() . "\n";
            error_log($logMessage, 3, "logs/error.log");
            return false;
        }
    }
}
