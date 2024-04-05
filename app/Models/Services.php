<?php

namespace PrestigeCarCleaning\Models;

use PDOException;

class Services extends Sql
{
    public function __construct()
    {
        $this->table = 'services';
    }

    public function getServiceById($id)
    {
        return $this->getById('idService', $id);
    }

    public function getProductComposant($id)
    {
        $sql = "SELECT p.idProduct, p.nameProduct FROM products p
        INNER JOIN toUse tu ON p.idProduct = tu.idProduct
        WHERE tu.idService = ?";
        $params = [$id];
        
        return $this->requete($sql, $params)->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getServiceAll()
    {
        return $this->getAll();
    }

    public function addService($name, $text, $price, $product)
    {
        $model = [
            'nameService' => htmlspecialchars($name),
            'text' => htmlspecialchars($text),
            'price' => htmlspecialchars($price)
        ];

        return $this->transactionService(null, $model, $product);
    }

    public function updateService($id, $name, $text, $price, $product)
    {
        $model = [
            'nameService' => htmlspecialchars($name),
            'text' => htmlspecialchars($text),
            'price' => htmlspecialchars($price)
        ];

        return $this->transactionService($id, $model, $product, true);
    }

    public function deleteService($id)
    {
        return $this->transactionService($id, null, null, false, true);
    }

    public function addAsso($id, $product)
    {
        foreach ($product as $productId) {
            $this->requete("INSERT INTO toUse (idService, idProduct) VALUES (?, ?)", [$id, $productId]);
        }
    }

    public function deleteAsso($serviceId)
    {
        return $this->requete("DELETE FROM toUse WHERE idService = ?", [$serviceId]);
    }

    public function deleteComment($serviceId)
    {
        return $this->requete("DELETE FROM comments WHERE idService = ?", [$serviceId]);
    }

    public function transactionService($id, $model, $product, $update = false, $delete = false)
    {
        try {
            // Initialisation de la variable $pdo
            $pdo = null;

            // Vérifiez si la connexion PDO est déjà initialisée
            if ($this->dbConnection === null) {
                // Si ce n'est pas le cas, initialisez la connexion PDO
                $pdo = $this->dbConnection = $this->connection();
            } else {
                // Si la connexion est déjà initialisée, attribuez-la à la variable $pdo
                $pdo = $this->dbConnection;
            }

            $pdo->beginTransaction();

            // Si c'est une mise à jour, exécutez la mise à jour
            if ($update === true) {

                $this->deleteAsso($id);
                $this->update('idService', $id, $model);
                $this->addAsso($id, $product);
            } else if ($delete === true) {

                $this->deleteAsso($id);
                $this->deleteComment($id);
                $this->delete('idService', $id);
            } else {

                $this->add($model);
                // Obtenir l'ID de la nouvelle prestation
                $newId = $pdo->lastInsertId();
                $this->addAsso($newId, $product);
            }

            // Valide la transaction
            $pdo->commit();
            return true;
        } catch (PDOException $e) {
            // En cas d'exception, annulation de la transaction et retournez false
            $pdo->rollback();
            $logMessage = "Date : " . date('d-m-Y H:i:s') . " - Erreur lors de la transaction : " . $e->getMessage() . "\n";
            error_log($logMessage, 3, "logs/error.log");
            return false;
        }
    }
}
