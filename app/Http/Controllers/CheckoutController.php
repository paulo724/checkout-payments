<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    protected $orderRepository;
    protected $stripeController;
    public function __construct(OrderRepository $orderRepository, StripeController $stripeController)
    {
        $this->orderRepository = $orderRepository;
        $this->stripeController = $stripeController;
    }

    public function createNewOrder(Request $request)
    {
        if ($request->session()->has('cart')) {
            $orde = $this->stripeController->createCustomer($request);
            return $orde;
        } else {
            return response()->json([
                'code' => 401,
                'data' => 'Sessão invalida!'
            ]);
        }
    }

    public function placeOrder(Request $request)
    {
        // request validation required

        $params = [
            'stripe_id'         => $request->dataOrder['stripe_id'],
            'total'             =>  $request->dataOrder['total'],
            'products_count'    =>  [
                'stripe_id'     =>  $request->dataOrder['subscription'],
                'products'      =>  $request->dataOrder['products']
            ],
            'payment_status'    =>  $request->dataOrder['payment_status'],
            'payment_method'    =>  $request->dataOrder['payment_method'],
            'name'              =>  $request->dataOrder['name'],
            'cpf'               =>  $request->dataOrder['cpf'],
            'email'             =>  $request->dataOrder['email'],
            'phone_number'      =>  $request->dataOrder['phone'],
            'address'           =>  $request->address,
            'city'              =>  $request->city,
            'country'           =>  $request->country,
            'post_code'         =>  $request->post_code,
        ];

        Log::debug([$params]);

        $order = $this->orderRepository->storeOrderDetails($params);
        return response()->json([
            'code' => 200,
            'data' => $request->all()
        ]);
    }
}
