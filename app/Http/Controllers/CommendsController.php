<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\commends;
use App\Models\Products;
use App\Models\Accessoir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class CommendsController extends Controller
{



    /**
     * Display a listing of the resource.
     */

    
     public function index()
     {
         $commands = commends::with(['product', 'food', 'accessoir'])
                         ->where('status', 'invalid')
                         ->get();
     //dd($commands);
         $isPayed = false;
         return view('command.index', compact('commands', 'isPayed'));
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
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez vous connecter pour passer une commande.');
        }
        
        $productId = $request->input('product_id');
        $userId = Auth::id();
    $isPayed = false ;
        $product = Products::findOrFail($productId);
    
        
        
        commends::create([
            'products_id' => $productId,
            'user_id' => $userId,
            'total_price' => $product->price ,
            'status' => 'invalid',
        ]);
    
        return redirect()->back()->with('success', 'Votre commande a été passée avec succès.');
    }

public function storeAccessoir(Request $request)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Vous devez vous connecter pour passer une commande.');
    }
    
    $accessoirId = $request->input('accessoir_id');
    $userId = Auth::id();

    $accessoir = Accessoir::findOrFail($accessoirId);

    commends::create([
        
        'accessoir_id' => $accessoirId,
        'user_id' => $userId,
        'total_price' => $accessoir->price, 
        'status' => 'invalid',
    ]);

    return redirect()->back()->with('success', 'Votre commande d\'accessoire a été passée avec succès.');
     
}


public function storeFood(Request $request)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Vous devez vous connecter pour passer une commande.');
    }
    
    $foodId = $request->input('food_id');
    $userId = Auth::id();

    $food = Food::findOrFail($foodId);
    
    // $existingCommand = commends::where('food_id', $foodId)
    //                             ->where('user_id', $userId)
    //                             ->where('status', 'invalid') 
    //                             ->first();

    if ($food->quantity > 0) {
        $food->quantity -= 1; 
        $food->save();

        commends::create([
            'food_id' => $foodId,
            'user_id' => $userId,
            'total_price' => $food->price,
            'status' => 'invalid', 
        ]);
        
        return redirect()->back()->with('success', 'Votre commande de nourriture a été passée avec succès.');
    } 

   
    // if ($existingCommand) {
    //     $food->quantity += 1; 
    //     $food->save();

    //     $existingCommand->delete(); 

      //  return redirect()->back()->with('success', 'Votre commande de nourriture a été annulée avec succès.');
   // }
}




    /**
     * Display the specified resource.
     */
    public function show(commends $commends)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(commends $commends)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, commends $command) 
    {
        
 
       
    
        //return redirect()->back()->with('status', 'Update successful');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(commends $Commande)
    {
        $Commande->delete();
        return redirect()->back()->with('success', 'Votre commande a été suprimer avec succès.');

    }
}
