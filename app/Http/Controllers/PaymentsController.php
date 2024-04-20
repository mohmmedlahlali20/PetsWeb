<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\payment;
use App\Models\commends;
use App\Models\Products;
use App\Models\Accessoir;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
                    'currency' => 'MAD',
                    'unit_amount' => $totalAmount * 100, 
                    'product_data' => [
                        'name' => 'One piece 3amek',
                    ],
                ],
                'quantity' => 1,
            ],
        ],
        'mode' => 'payment',
        'success_url' => route('success', ['success' => true]),
        'cancel_url' => route('GetPayment'),
    ]);

    $payment = Payment::create([
        'amount' => $totalAmount,
        'payment_status' => 'valider',
        'stripe_payment_id' => $session->id,
        'commend_id' =>  $commendId,
        'strip_user_name'=> $userName
    ]);

    if ($payment) {
        commends::where('id', $commendId)->update(['status' => 'valide']);
    }
    

    return redirect()->to($session->url);
}

    
public function success(Request $request)
{
    $user = auth()->user();

    $commands = $user->commands()
                     ->whereHas('payment', function ($query) {
                         $query->where('payment_status', 'valider');
                     })
                     ->with(['product', 'food', 'accessoir'])
                     ->get();
        //dd($commands);
    $productCounts = [];
    $totalPrice = 0;

    foreach ($commands as $command) {
        if ($command->product) {
            $productName = $command->product->name;
            $productCounts[$productName] = isset($productCounts[$productName]) ? $productCounts[$productName] + 1 : 1;
            $totalPrice += $command->total_price;
        } elseif ($command->food) {
            $productName = $command->food->name;
            $productCounts[$productName] = isset($productCounts[$productName]) ? $productCounts[$productName] + 1 : 1;
            $totalPrice += $command->total_price;
        } elseif ($command->accessoir) {
            $productName = $command->accessoir->name;
            $productCounts[$productName] = isset($productCounts[$productName]) ? $productCounts[$productName] + 1 : 1;
            $totalPrice += $command->total_price;
        }
    }

    // Generate QR code
    $productNamesString = implode(', ', array_keys($productCounts));
    $date = now()->format('Y-m-d');
    $qrcode = QrCode::size(200)
                    ->generate("Products: $productNamesString\nDate: $date\nTotal Price: $totalPrice MAD");

    // Pass data to the view
    return view('command.success', compact('qrcode', 'productCounts', 'commands', 'totalPrice'));
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
