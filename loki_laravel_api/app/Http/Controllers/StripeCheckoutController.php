<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Product;


class StripeCheckoutController extends Controller
{
    public function createCheckoutSession(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        \Stripe\Stripe::setVerifySslCerts(false); // Ne pas metytre cette ligne en prod. Pour ne pas prendre en compte le ssl (nous sommes en local)

        if(!$request->has('cart')) {
            return response()->json(['error' => 'une erreur inattendue s\'est produite']);
        }

        $cart = $request->cart;
        $lineItems = [];
        $total = 0;

        foreach($cart AS $item) {
            $product = Product::find($item['id']);
            if(!$product) {
                return response()->json(['error' => 'Produit introuvable']);
            }
            $unitPrice = $product->price * 100; // Stripe attends des prix en centimes

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $product->title,
                        'description' => $product->description ?? 'auncun description pour ce produit',
                    ],
                    'unit_amount' => $unitPrice,
                ],
                'quantity' => $item['quantity'],
            ];

            $total += $unitPrice * $item['quantity'];
        }

        if($total === 0) {
            return response()->json(['error' => 'une erreur inattendue s\'est produite']);
        }

        try {
            $checkoutSession = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => 'http://localhost/loki_eshop/cart.php?payment=success',
                'cancel_url' => 'http://localhost/loki_eshop/cart.php?payment=cancel',
            ]);
            return response()->json(['id' => $checkoutSession->id]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
