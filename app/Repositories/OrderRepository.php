<?php

namespace App\Repositories;

use Cart;
use App\Models\Product;
use App\Contratos\OrderContract;
use App\Models\Order;
use App\Models\OrderProducts;

class OrderRepository
{
    private $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function storeOrderDetails($params)
    {
        $order = Order::create([
            'order_number'      =>  'ORD-' . strtoupper(uniqid()),
            'stripe_id'         => $params['stripe_id'],
            'status'            =>  'pending',
            'total'             =>  $params['total'],
            'products_count'    =>  count($params['products_count']),
            'payment_status'    =>  $params['payment_status'],
            'payment_method'    =>  $params['payment_method'],
            'name'              =>  $params['name'],
            'cpf'               =>  $params['cpf'],
            'email'             =>  $params['email'],
            'phone_number'      =>  $params['phone_number'],
            'address'           =>  $params['address'],
            'city'              =>  $params['city'],
            'country'           =>  $params['country'],
            'post_code'         =>  $params['post_code'],
        ]);

        if ($order) {

            $items = $params['products_count'];

            foreach ($items['products'] as $item) {
                $product = Product::where('stripe_prod', $item['product_id'])->first();
                $orderItem = new OrderProducts([
                    'order_id'          =>  $order->id,
                    'product_id'        =>  $product->id,
                    'stripe_id'         =>  $params['stripe_id'],
                    'stripe_product'    =>  $item['product_id'],
                    'stripe_price'      =>  $item['price_id'],
                    'quantity'          =>  $item['quantity'],
                ]);
                $orderItem->save();
            }
        }
        return $order;
    }
}
