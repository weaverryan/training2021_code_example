<?php

namespace App\Service;

use App\Model\Product;

class ProductRepository
{
    /**
     * @return Product[]
     */
    public function findAll(): array
    {
        $projectDir = __DIR__.'/../../';
        $pdo = new \PDO('sqlite://'.$projectDir.'/var/data.db');
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        $results = $pdo->query('SELECT * FROM product')->fetchAll();
        $products = [];
        foreach ($results as $result) {
            $product = new Product();
            $product->setId($result['id']);
            $product->setName($result['name']);
            $product->setPrice($result['price']);
            $product->setDescription($result['description']);

            $products[] = $product;
        }

        return $products;
    }
}
