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
        //dd($commands);
        return view('command.index', compact('commands'));
    }

    public function checkout(Request $request)
    {
        $userName = auth()->user()->name;
        $commendId = $request->input('command_id');
        $foodsTotalAmount = Food::sum('price');

        // Calculate total amount from accessories
        $accessoiresTotalAmount = Accessoir::sum('price');
    
        $productsTotalAmount = Products::sum('price');
    

        $totalAmountPaid = $foodsTotalAmount + $accessoiresTotalAmount + $productsTotalAmount;
    
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'MAD',
                        'unit_amount' => $totalAmountPaid * 100, 
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
            'amount' => $totalAmountPaid,
            'payment_status' => 'valider',
            'stripe_payment_id' => $session->id,
            'commend_id' =>  $commendId,
            'strip_user_name'=> $userName
        ]);
    
        if ($payment) {
           
            commends::find($commendId)->delete();
        }
    
        return redirect()->to($session->url);
    }
    
   
    public function success(Request $request)
    {
       
    }


    public function AllPayment(){
        $items = payment::with('commend')->get();
//dd($items);
        $total = $items->sum('amount'); 

        return view('DashbordAdmin.payment.index', compact('items', 'total'));
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
