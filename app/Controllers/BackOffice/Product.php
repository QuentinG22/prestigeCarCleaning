<?php

namespace PrestigeCarCleaning\Controllers\BackOffice;

use PrestigeCarCleaning\Controllers\ViewManager;
use PrestigeCarCleaning\Models\Products;

class Product
{
    public function index()
    {
        $title = "Gestion des produits - Prestige Car Cleaning";
        $productsAll = $this->getProductsAll();
        return ViewManager::render('backOffice/products', ['title' => $title, 'productsAll' => $productsAll,]);
    }

    public function getProductsAll()
    {
        $model = new Products();
        return $productsAll = $model->getAll();
    }

    public function addProduct()
    {
        $name = $_POST["name"];
        $description = $_POST["description"];

        // Créer une instance utilisateur avec les données
        $model = new Products();
        $result = $model->addProduct($name, $description);

        if ($result === false) {
            $error = 'La création du produit a échoué.';
            $success = '';
        } else {
            $success = 'le produit a bien été ajouté.';
            $error = '';
        }

        $productsAll = $model->getProductsAll();

        // Passer les messages d'erreur et de succès à la vue en utilisant la méthode statique de ViewManager
        $title = "Gestion des prestations - Prestige Car Cleaning";
        return ViewManager::render('backOffice/products', ['title' => $title, 'productsAll' => $productsAll, 'error' => $error, 'success' => $success]);
    }

    public function updateProduct()
    {
        $id = $_POST["selectedProductId"];
        $name = $_POST["name"];
        $description = $_POST["description"];

        // Créer une instance utilisateur avec les données
        $model = new Products();
        $result = $model->updateProduct($id, $name, $description);

        if ($result === false) {
            $error = 'La modification du produit a échoué.';
            $success = '';
        } else {
            $success = 'le produit a bien été modifier.';
            $error = '';
        }

        $productsAll = $model->getProductsAll();

        // Passer les messages d'erreur et de succès à la vue en utilisant la méthode statique de ViewManager
        $title = "Gestion des prestations - Prestige Car Cleaning";
        return ViewManager::render('backOffice/products', ['title' => $title, 'productsAll' => $productsAll, 'error' => $error, 'success' => $success]);
    }

    public function deleteProduct()
    {
        $id = $_POST["selectedProductId"];

        // Créer une instance utilisateur avec les données
        $model = new Products();
        $result = $model->deleteProduct($id);

        if ($result === false) {
            $error = 'La suppression du produit a échoué.';
            $success = '';
        } else {
            $success = 'le produit a bien été supprimer.';
            $error = '';
        }

        $productsAll = $model->getProductsAll();

        // Passer les messages d'erreur et de succès à la vue en utilisant la méthode statique de ViewManager
        $title = "Gestion des prestations - Prestige Car Cleaning";
        return ViewManager::render('backOffice/products', ['title' => $title, 'productsAll' => $productsAll, 'error' => $error, 'success' => $success]);
    }
}
