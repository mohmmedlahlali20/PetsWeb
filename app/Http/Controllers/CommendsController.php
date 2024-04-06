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
         $commands = commends::paginate(4);
     
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
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez vous connecter pour passer une commande.');
        }
        
        $productId = $request->input('product_id');
        $userId = Auth::id();
    
        $product = Products::findOrFail($productId);
    
        
        
        commends::create([
            'products_id' => $productId,
            'user_id' => $userId,
            'total_price' => $product->price 
        ]);
    
        return redirect()->back()->with('success', 'Votre commande a été passée avec succès.');
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
