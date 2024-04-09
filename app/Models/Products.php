<?php

namespace PrestigeCarCleaning\Models;

class Products extends Sql
{
    public function __construct()
    {
        $this->table = 'PRODUCTS';
    }

    public function getproductsAll()
    {
        return $this->getAll();
    }

    public function addProduct($name, $description)
    {
        $model = [
            'nameProduct' => htmlspecialchars($name),
            'description' => htmlspecialchars($description),
        ];

        return $this->add($model);
    }

    public function updateProduct($id, $name, $text)
    {
        $model = [
            'nameProduct' => htmlspecialchars($name),
            'description' => htmlspecialchars($text),
        ];

        return $this->update('idProduct', $id, $model);
    }

    public function deleteProduct($id)
    {
        $this->requete("DELETE FROM toUse WHERE idProduct = ?", [$id]);
        return $this->delete('idProduct', $id);
    }
}
