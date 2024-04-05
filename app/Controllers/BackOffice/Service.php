<?php

namespace PrestigeCarCleaning\Controllers\BackOffice;

use PrestigeCarCleaning\Controllers\ViewManager;
use PrestigeCarCleaning\Models\Services;
use PrestigeCarCleaning\Models\Products;

class Service
{
    public function index()
    {
        $title = "Gestion des prestations - Prestige Car Cleaning";
        $model = new Products(); 
        $productsAll = $model->getProductsAll();

        $servicesAll = $this->getServicesAll();

        // Passer les données des produits à la vue
        $title = "Gestion des prestations - Prestige Car Cleaning";
        ViewManager::render('backOffice/service', ['title' => $title, 'productsAll' => $productsAll, 'servicesAll' => $servicesAll]);
    }

    public function getServicesAll()
    {
        $model = new Services();
        return $result = $model->getAll();
    }

    public function addService()
    {
        $name = $_POST["name"];
        $text = $_POST["description"];
        $price = $_POST["price"];
        $selectedProducts = $_POST['products'];

        // Créer une instance utilisateur avec les données
        $model = new Services();
        $result = $model->addService($name, $text, $price, $selectedProducts);

        if ($result === false) {
            $error = 'La création de la prestation a échoué.';
            $success = '';
        } else {
            $success = 'la prestation a bien été ajouter.';
            $error = '';
        }

        $productModel = new Products();
        $productsAll = $productModel->getProductsAll();

        $servicesAll = $this->getServicesAll();
        // Passer les messages d'erreur et de succès à la vue en utilisant la méthode statique de ViewManager
        $title = "Gestion des prestations - Prestige Car Cleaning";
        return ViewManager::render('backOffice/service', ['title' => $title, 'error' => $error, 'success' => $success, 'productsAll' => $productsAll, 'servicesAll' => $servicesAll]);
    }

    public function updateService()
    {
        $id =$_POST['selectedServiceId'];
        $name = $_POST["name"];
        $text = $_POST["description"];
        $price = $_POST["price"];
        $selectedProducts = $_POST['products'];

        // Créer une instance utilisateur avec les données
        $model = new Services();
        $result = $model->updateService($id, $name, $text, $price, $selectedProducts);

        if ($result === false) {
            $error = 'La modification de la prestation a échoué.';
            $success = '';
        } else {
            $success = 'la prestation a bien été modifer.';
            $error = '';
        }

        $productModel = new Products();
        $productsAll = $productModel->getProductsAll();

        $servicesAll = $this->getServicesAll();
        // Passer les messages d'erreur et de succès à la vue en utilisant la méthode statique de ViewManager
        $title = "Gestion des prestations - Prestige Car Cleaning";
        return ViewManager::render('backOffice/service', ['title' => $title, 'error' => $error, 'success' => $success, 'productsAll' => $productsAll, 'servicesAll' => $servicesAll]);
    }

    public function deleteService()
    {
        $id = $_POST['selectedServiceId'];

        // Créer une instance utilisateur avec les données
        $service = new Services();
        $service->deleteAsso($id);
        $isService = $service->deleteService($id);

        if ($isService === false) {
            $error = 'La suppresion de la prestation a échoué.';
            $success = '';
        } else {
            $success = 'la prestation a bien été supprimer.';
            $error = '';
        }

        $productModel = new Products();
        $productsAll = $productModel->getProductsAll();

        $servicesAll = $this->getServicesAll();
        // Passer les messages d'erreur et de succès à la vue en utilisant la méthode statique de ViewManager
        $title = "Gestion des prestations - Prestige Car Cleaning";
        return ViewManager::render('backOffice/service', ['title' => $title, 'error' => $error, 'success' => $success, 'productsAll' => $productsAll, 'servicesAll' => $servicesAll]);
    }

    public function fetchServiceDetails($id)
    {
        $model = new Services;
        $service = $model->getServiceById($id);
        $products = $model->getProductComposant($id);

        // Construire un tableau contenant les détails de la prestation et les produits associés
        $data = array(
            "name" => $service->nameService,
            "description" => $service->text,
            "price" => $service->price,
            "products" => $products
        );
    
        $json = json_encode($data);
        // Envoyer la réponse JSON
        header('Content-Type: application/json');
        echo $json;
        exit();
    }
}
