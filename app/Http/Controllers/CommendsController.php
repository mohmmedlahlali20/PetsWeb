<?php

namespace App\Http\Controllers;

use App\Models\commends;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommendsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commands = commends::with('product')
        ->where('user_id', Auth::id())
        ->paginate(4);
    
    //dd($commands);
        //dd($commands);
    return view('command.index', compact('commands'));
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
         $productId = $request->input('product_id');
         $userId = Auth::id();
     
//dd($request->input('product_id'));
         $product = Products::findOrFail($productId);
//dd($product);
         if ($product->quantity > 0) {

             $product->quantity -= 1; 
             $product->save();
//dd( $product->save());
              $a = commends::create([
                 'products_id' => $productId,
                 'user_id' => $userId,
                 'total_price' => $product->price 
             ]);
//dd($a);
            
     
             return redirect()->back()->with('success', 'Votre commande a été passée avec succès.');
         } else {
             return redirect()->back()->with('error', 'Désolé, la quantité disponible de ce produit est insuffisante.');
         }
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
