<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProducts()
    {
        $products = $this->productRepository->getProducts();
        return $products;
    }

    public function getProductByCode($params)
    {
        $product = $this->productRepository->getProductByCode($params);
        return $product;
    }

    public function getProductById($params)
    {
        $product = $this->productRepository->getProductById($params);
        return $product;
    }
}
