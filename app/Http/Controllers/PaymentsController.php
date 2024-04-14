<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\payment;
use App\Models\commends;
use App\Models\Products;
use App\Models\Accessoir;
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
        $userName = auth()->user()->name;
        $commendId = $request->input('command_id');
        $foods = Food::all();
        $foodTotalAmount = 0;
    
        foreach ($foods as $food) {
            $foodTotalAmount += $food->price;
        }
    
        $accessoires = Accessoir::all();
        $accessoirTotalAmount = 0;
    
        foreach ($accessoires as $accessoir) {
            $accessoirTotalAmount += $accessoir->price;
        }
    
        $total = $foodTotalAmount + $accessoirTotalAmount;
    
        $products = Products::all();
        $totalAmount = 0;
    
        foreach ($products as $product) {
            $totalAmount += $product->price;
        }
    
        $totalAmount += $total;
    
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'unit_amount' => $totalAmount * 100, 
                        'product_data' => [
                            'name' => 'النقودالنقودالنقودالنقود',
                        ],
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('Commandes.index').'?success=true',
            'cancel_url' => route('GetPayment'),
        ]);
    
        $payment = Payment::create([
            'amount' => $totalAmount,
            'payment_status' => 'valider',
            'stripe_payment_id' => $session->id,
            'commend_id' =>  $commendId,
            'strip_user_name'=> $userName
        ]);
    
        // Vérifier si le paiement a été créé avec succès avant de supprimer la commande
        if ($payment) {
            // Supprimer la commande non payée
            commends::find($commendId)->delete();
        }
    
        return redirect()->to($session->url);
    }
    
   
    public function success(Request $request)
    {
       
    }



        public function AllPayment(){
           $payment =  payment::all();
           //dd($payment);
            return view('DashbordAdmin.payment.index',compact('payment'));
            
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
