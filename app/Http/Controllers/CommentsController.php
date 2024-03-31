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
        //
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
  

     public function store(CommentesRequest $commentes)
     {
        dd($commentes);
         // Vérifie si l'utilisateur est connecté
         if (Auth::check()) {
             // Crée un nouveau commentaire en utilisant les données du formulaire
             $comment = new comments();
             //dd($comment);
             $comment->products_id = $commentes->input('products_id');
             //$comment->user_id = Auth::id(); // Obtient l'ID de l'utilisateur connecté
             $comment->rate_number = $commentes->input('rating');
             $comment->comments = $commentes->input('comments');
     
             // Enregistre le commentaire dans la base de données
             $comment->save();
             dd( $comment->save());
     
             return redirect()->back()->with('success', 'Comment added successfully.');
         } else {
             return redirect()->back()->with('error', 'You need to be logged in to add a comment.');
         }
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
