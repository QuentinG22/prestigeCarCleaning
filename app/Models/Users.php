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

    public function getUser($email)
    {
        $sql = "SELECT * FROM $this->table WHERE email = ?";
        return $this->requete($sql, [$email])->fetch(PDO::FETCH_OBJ);
    }

    public function addUser($name, $firstname,  $email, $phone, $password, $isAdmin)
    {
        // Création du modèle de données
        $model = [
            'name' => htmlspecialchars($name),
            'firstname' => htmlspecialchars($firstname),
            'email' => htmlspecialchars($email),
            'phone' => $phone,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'isAdmin' => $isAdmin
        ];

        return $this->add($model);
    }

    public function updateUser($id, $data = [])
    {
        if(!empty($data['ancientPassword']) && !empty($data['password'])){
            $userBd = $this->getUser($_SESSION['userEmail']);
            if(!password_verify($data['ancientPassword'], $userBd->password)){
                return "Ancien mot de passe incorrect.";
            } else {
                $result = $this->update('idUser', $id, ['password' => password_hash($data['password'], PASSWORD_DEFAULT)]);
                if($result !== false){
                    return true;
                }
            }
        } else if (!empty($data['email'])) {
            $control = $this->requete("SELECT COUNT(email) FROM users WHERE email = ?", [$data['email']])->fetchColumn();
            if ($control > 0){
                return "L'adresse e-mail est déjà utilisée par un autre utilisateur.";
            } else {
                $result = $this->update('idUser', $id, $data);
                if($result !== false){
                    return true;
                }
            }
        } else {
            $result = $this->update('idUser', $id, $data);
            if($result !== false){
                return true;
            }
        }
    }

    public function deleteUser($id)
    {
        $sql = "DELETE COMMENTS, USERS FROM COMMENTS
        INNER JOIN USERS ON COMMENTS.idUser = USERS.idUser
        WHERE COMMENTS.idUser = ?";
        return $this->requete($sql, [$id]);
    }

    public function login($email, $password)
    {
        $result = $this->getUser($email);
        if ($result !== false) {
            if (password_verify($password, $result->password)) {
                return $result;
            } else {
                return "Mot de passe incorrect.";
            }
        } else {
            return "Adresse e-mail incorrect.";
        }
    }
}
