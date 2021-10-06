<?php

namespace App\Service;

use App\Model\Product;

class ProductRepository
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return Product[]
     */
    public function findAll(): array
    {
        $results = $this->pdo->query('SELECT * FROM product')->fetchAll();
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
