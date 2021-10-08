<?php

namespace App\Controller;

use App\Model\Product;
use App\Service\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/products", name="app_product_list")
     */
    public function list(ProductRepository $productRepository)
    {
        $products = $productRepository->findAll();

        return $this->render('product/list.html.twig', [
            'products' => $products,
        ]);
    }

    /**
     * @Route("/api/products")
     */
    public function getProductsApi(ProductRepository $productRepository)
    {
        $products = $productRepository->findAll();

        return $this->json(['data' => $products]);
    }
}
