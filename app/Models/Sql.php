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
    protected $dbConnection;

    public function requete($sql, $attributs = [])
    {
        // Vérifie si la connexion PDO est déjà initialisée
        if ($this->dbConnection === null) {
            // Si ce n'est pas le cas, initialise la connexion PDO
            $this->dbConnection = $this->connection();
        }
        try {
            $result = $this->dbConnection->prepare($sql);
            $result->execute($attributs);
            return $result;
        } catch (PDOException $e) {
            // Enregistrement dans le fichier de journal
            $logMessage = "Date : " . date('d-m-Y H:i:s') . " - Erreur requete : " . $e->getMessage() . "\n";
            error_log($logMessage, 3, "logs/error.log");
            // Vous pouvez relancer l'exception ici si nécessaire
            throw $e;
            return false;
        }
    }

    public function getAll()
    {
        $sql = $this->requete('SELECT * FROM ' . $this->table);
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($nameId, $id)
    {
        return $this->requete("SELECT * FROM $this->table WHERE $nameId = $id")->fetch(PDO::FETCH_OBJ);
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

    public function update($nameId, $id, $model)
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

        return $this->requete("UPDATE $this->table SET $keyList WHERE $nameId = ?", $value);
    }

    public  function delete($nameId, $id)
    {
        return $this->requete("DELETE FROM $this->table WHERE $nameId = ?", [$id]);
    }
}
