<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ProductController;
use Livewire\Component;

class ShowProducts extends Component
{
    public $products;

    public function render(ProductController $productController)
    {
        $this->products = $productController->getProducts();
        return view('livewire.show-products', ['products' => $this->products]);
    }
}
