<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StripeController extends Controller
{
    public function createCustomer(Request $request)
    {
        $stripe = new \Stripe\StripeClient('sk_test_51N3UsIGZ2CkNUhfuK1aD9b9mPUHaTE8EiZNw8SBcwpL2jVO3xlWHMdsq05kF4IlPGh1cHLP4EHS262R3dqss6VSt00qzUXQwC0');

        if ($request->session()->has('cart')) {
            $customer = $stripe->customers->create([
                'name' => $request->data['name'],
                'email' => $request->data['email']
            ]);
            
            $prices_id = [];
            $products = [];

            foreach ($request->session()->get('cart') as $product) {
                $price = $stripe->prices->create([
                    'unit_amount' => str_replace('.', '', $product['product']->value) * 10,
                    'currency' => 'brl',
                    'recurring' => ['interval' => 'month'],
                    'product' => $product['product']->stripe_prod
                ]);

                array_push($prices_id, [
                    'price' => $price->id,
                    'quantity' => $product['quantity']
                ]);

                array_push($products, [
                    'price_id' => $price->id,
                    'quantity' => $product['quantity'],
                    'product_id' => $product['product']->stripe_prod
                ]);
            }

            $subscription = $stripe->subscriptions->create([
                'customer' => $customer->id,
                'items' => [$prices_id],
                'payment_behavior' => 'default_incomplete',
                'payment_settings' => ['save_default_payment_method' => 'on_subscription'],
                'expand' => ['latest_invoice.payment_intent'],
            ]);
        } else {
            return response()->json([
                'code' => 401,
                'data' => 'Sessão invalida!'
            ]);
        }

        return response()->json([
            'code' => 200,
            'clientSecret' => $subscription->latest_invoice->payment_intent->client_secret,
            'subscription' => $subscription->id,
            'products' => $products,
            'customer' => $customer->id
        ]);
    }
}
