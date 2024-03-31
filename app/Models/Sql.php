<?php

namespace PrestigeCarCleaning\Models;

use PrestigeCarCleaning\Models\DbConnect;
use PDO;
use PDOException;

class Sql extends DbConnect
{
    // La table de la base de données
    protected $table;

    // Instance de connexion a la base de données.
    private $dbConnection;

    public function requete($sql, $attributs = [])
    {
        $this->dbConnection = parent::connection();
        try {
            $result = $this->dbConnection->prepare($sql);
            $result->execute($attributs);
            return $result;
        } catch (PDOException $e) {
            // Enregistrement dans le fichier de journal
            $logMessage = "Date : " . date('d-m-Y H:i:s') . " - Erreur PDO : " . $e->getMessage() . "\n";
            error_log($logMessage, 3, "logs/error.log");
            return false;
        }
    }

    public function getAll()
    {
        $sql = $this->requete('SELECT * FROM ' . $this->table);
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    public function getBy($params)
    {
        $key = [];
        $value = [];

        // Boucle pour séparer le tableau
        foreach ($params as $paramKey => $paramValue) {
            $keyL[] = "$paramKey = ?";
            $value[] = $paramValue;
        }

        // On transforme le tableau en chaîne de caractères séparée par des AND
        // exemple: $keyList = "nom = ? AND prenom = ? AND age = ?";
        $keyList = implode(' AND ', $key);

        return $this->requete("SELECT * FROM $this->table WHERE $keyList, $value")->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($id)
    {
        return $this->requete("SELECT * FROM $this->table WHERE id = $id")->fetch(PDO::FETCH_OBJ);
    }

    public function add($model)
    {
        $key = [];
        $inter = [];
        $value = [];

        // Boucle pour séparer le tableau
        foreach ($model as $paramKey => $paramValue) {
            if ($paramValue !== null && $paramKey != 'dbConnection' && $paramKey != 'table') {
                $key[] = $paramKey;
                $inter[] = '?';
                $value[] = $paramValue;
            }
        }

        // Transforme le tableau "key et inter" en chaine de caractères
        $keyList = implode(', ', $key);
        $interList = implode(', ', $inter);

        // exemple requete envoyer: INSERT INTO contacts (name, firstname, email, object, text, _date, idUser) VALUES (?, ?, ?, ?, ?, ?, ?)
        return $this->requete("INSERT INTO $this->table ($keyList) VALUES ($interList)", $value);
    }

    public function update($id, $model)
    {
        $key = [];
        $value = [];

        // Boucle pour séparer le tableau
        foreach ($model as $paramKey => $paramValue) {
            if ($paramValue !== null && $paramKey != 'dbConnection' && $paramKey != 'table') {
                $key[] = "$paramKey = ?";
                $value[] = $paramValue;
            }
        }

        $value[] = $id;

        // Transforme le tableau "key et inter" en chaine de caractères
        $keyList = implode(', ', $key);

        return $this->requete("UPDATE $this->table SET $keyList WHERE id = ?", $value);
    }

    public  function delete($id)
    {
        return $this->requete("DELETE FROM $this->table WHERE id = ?", [$id]);
    }
}
