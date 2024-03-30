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
        $commands = commends::with('product')->where('user_id', Auth::id())->paginate(4);
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
     
         // Récupérer le produit correspondant à partir de la base de données
         $product = Products::findOrFail($productId);
     
         // Vérifier si la quantité disponible est suffisante
         if ($product->quantity > 0) {
             // Réduire la quantité disponible du produit
             $product->quantity -= 1; // Réduire d'une unité
             $product->save();
     
             // Créer une nouvelle commande
             commends::create([
                 'products_id' => $productId,
                 'user_id' => $userId,
                 'total_price' => $product->price // Utiliser le prix du produit comme prix total de la commande
             ]);
     
             // Vider la commande de l'utilisateur après le paiement
             $userCommands = commends::where('user_id', $userId)->where('products_id', $productId)->get();
             foreach ($userCommands as $command) {
                 $command->delete();
             }
     
             return redirect()->back()->with('success', 'Votre commande a été passée avec succès.');
         } else {
             // Rediriger avec un message d'erreur si la quantité disponible est insuffisante
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
        
 
        dd($command);
    
        $command->update([
            'commend' => $request->input('status')
        ]);
    
        //return redirect()->back()->with('status', 'Update successful');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(commends $commends)
    {
        //
    }
}
