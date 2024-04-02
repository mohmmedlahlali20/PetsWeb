<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentesRequest;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // Récupérer les quatre derniers commentaires
    $conteier = comments::latest()->take(4)->get();
    //dd($comments);
    
    // Passer les commentaires à la vue
    return view('Pets.Show', compact('conteier'));
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
    //dd($request);
    // Valider les données soumises
    $request->validate([
        'products_id' => 'required|exists:products,id',
        'comments' => 'required|string',
        'rating' => 'required|integer|min:1|max:10',
    ]);

    // Créer un nouveau commentaire
    $comment = new comments();
    $comment->products_id = $request->input('products_id');
    $comment->user_id = auth()->id(); // ou toute autre méthode pour obtenir l'ID de l'utilisateur
    $comment->comments = $request->input('comments');
    $comment->rate_number = $request->input('rating');
    $comment->save();

    // Rediriger l'utilisateur ou afficher un message de succès
    return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
}

     
   
   /**
     * Display the specified resource.
     */
    public function show(comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comments $comments)
    {
        //
    }
}
