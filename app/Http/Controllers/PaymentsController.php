<?php

namespace App\Http\Controllers;

use App\Models\payment;
use App\Models\commends;
use App\Models\Products;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
   




/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commands = commends::paginate(4); 
        return view('command.index', compact('commands'));
    }


    public function checkout(Request $request)
    {
        $products = Products::all(); 
        $commend = $request->input('command_id');
        $totalAmount = 0;
    
        foreach ($products as $product) {
            $totalAmount += $product->price; 
        }
    
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'sayft lflus asahbi', 
                    ],
                    'unit_amount' => $totalAmount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('Commande.index'),
            'cancel_url' => route('GetPayment'),
        ]);
    
        payment::create([
            'amount' => $totalAmount,
            'payment_status' => 'valider',
            'stripe_payment_id' => $session->id,
            'commend_id' =>  $commend
        ]);
        return redirect()->to($session->url);
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
    public function show(payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(payment $payment)
    {
        //
    }







}
