<?php

namespace App\Http\Controllers;

use Stripe;
use App\Models\payments;
use App\Models\Products;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('command.index');
        }



        public function checkout()
{
    // Récupérer les produits dans le panier ou toute autre source appropriée
    $products = Products::all(); 
    
    $totalAmount = 0;

    // Calculer le montant total en bouclant à travers chaque produit
    foreach ($products as $product) {
        // Ajouter le prix du produit fois sa quantité au total
        $totalAmount += $product->price; 
    }

    // Créer une session de paiement Stripe avec le montant total
    \Stripe\Stripe::setApiKey(config('stripe.sk'));
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'sayft lflus asahbi', 
                ],
                'unit_amount' => $totalAmount * 100, // Convertir le montant total en cents
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => route('success'),
        'cancel_url' => route('GetPayment'),
    ]);

    // Rediriger l'utilisateur vers l'URL de paiement Stripe
    return redirect()->away($session->url);
}


    public function success(){
        return view('command.index');
    }
































































    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, payments $payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(payments $payments)
    {
        //
    }





}
