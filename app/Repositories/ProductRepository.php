<?php

namespace App\Repositories;

use Cart;
use App\Models\Product;
use App\Contratos\OrderContract;
use App\Models\Order;
use App\Models\OrderProducts;

class ProductRepository
{
    private $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getProducts()
    {
        $product = Product::all();
        return $product;
    }

    public function getProductByCode($code)
    {
        $product = Product::where('code', $code)->first();
        return $product;
    }
    public function getProductById($id)
    {
        $product = Product::find($id);
        return $product;
    }
}
