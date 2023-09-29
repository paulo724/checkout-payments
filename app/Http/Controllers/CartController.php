<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $productController;

    public function __construct(ProductController $productController)
    {
        $this->productController = $productController;
    }

    public function index(Request $request)
    {
        $data = [
            'cart' => $request->session()->get('cart')
        ];
        return response()->json([
            'cart' => $request->session()->get('cart'),
            'ammout' => $this->ammout($request)
        ], 200);
    }

    public function buy(Request $request)
    {
        if (!$request->session()->has('cart')) {
            $cart = [];
            $product = $this->productController->getProductById($request->code);
            array_push($cart, [
                'product' => $product,
                'quantity' => $request->quantity,
                'sub_total' => $request->quantity * $product->value
            ]);
            $request->session()->put('cart', $cart);
        } else {
            $cart = $request->session()->get('cart');
            $index = $this->exists($request->code, $cart);
            if ($index == -1) {
                $product = $this->productController->getProductById($request->code);
                array_push($cart, [
                    'product' => $product,
                    'quantity' => $request->quantity,
                    'sub_total' => $request->quantity * $product->value,
                ]);
            } else {
                $cart[$index]['quantity'] = $cart[$index]['quantity'] + $request->quantity;
                $cart[$index]['sub_total'] = $cart[$index]['quantity'] * $cart[$index]['product']->value;
            }
            $request->session()->put('cart', $cart);
        }
        //return response($cart, $this->ammout($request), 200);]
        return response()->json([
            'cart' => $request->session()->get('cart'),
            'ammout' => $this->ammout($request)
        ], 200);
    }

    public function ammout(Request $request)
    {
        $total = 0;
        if ($request->session()->has('cart')) {
            foreach ($request->session()->get('cart') as $product) {
                $total += $product['sub_total'];
            }
        }
        return $total;
    }

    public function remove($id, Request $request)
    {
        $cart = $request->session()->get('cart');
        $index = $this->exists($id, $cart);
        unset($cart[$index]);
        $request->session()->put('cart', array_values($cart));
        return $cart;
    }

    public function delete(Request $request)
    {
        $request->session()->forget('cart');
        $request->session()->flush();
        return response()->json([
            'Sessão deletada com sucesso!',
        ], 200);
    }

    public function update(Request $request)
    {
        $quantities = $request->input('quantity');
        $cart = $request->session()->get('cart');
        for ($i = 0; $i < count($cart); $i++) {
            $cart[$i]['quantity'] = $quantities[$i];
        }
        $request->session()->put('cart', $cart);
        return $cart;
    }

    private function exists($id, $cart)
    {
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['product']->id == $id) {
                return $i;
            }
        }
        return -1;
    }

    public function cart(Request $request)
    {
        $products = $this->productController->getProducts();

        return view('cart', compact('products'));
    }
}
