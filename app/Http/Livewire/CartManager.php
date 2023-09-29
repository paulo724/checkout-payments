<?php

namespace App\Http\Livewire;

use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use Livewire\Component;

class CartManager extends Component
{
    public $products_in_cart;

    public function mount(Request $request, CartController $cartController)
    {
        $this->products_in_cart = $cartController->index($request);
    }

    public function render()
    {
        return view('livewire.cart-manager', ['cart' => $this->products_in_cart]);
    }
}
