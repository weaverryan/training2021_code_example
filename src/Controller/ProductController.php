<?php

namespace App\Controller;

use App\Model\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/products")
     */
    public function list()
    {
        $projectDir = $this->getParameter('kernel.project_dir');
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

        return $this->render('product/list.html.twig', [
            'products' => $products,
        ]);
    }
}
