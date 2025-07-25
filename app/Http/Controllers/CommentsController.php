<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\comments;
use App\Models\Products;
use App\Models\Accessoir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentesRequest;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = comments::all();
     
        return view('Pets.Show', compact('comments'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
  


     public function store(Request $request)
     {
         $request->validate([
             'msg' => 'required',
             'rating' => ' required|integer|min:1|max:10',
         ]);
     
         if (Auth::check()) {
             $comment = new comments();
             $comment->comments = $request->input('msg');
             $comment->rate_number = $request->input('rating');
             $comment->products_id = $request->input('products_id');
             $comment->user_id = auth()->id(); 
     
             $comment->save();
     
             return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
         } else {
             return redirect()->route('login')->with('error', 'Vous devez vous connecter pour ajouter un commentaire.');
         }
     }
     
   
   /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {

        $products = Products::findOrFail($id);
        $comments = comments::where('products_id', $id)
                           ->orderBy('created_at', 'desc')
                           ->take(3)
                           ->get();
        $ratingsSum = $comments->sum('rate_number');
        $ratingsCount = $comments->count();
        $averageRating = $ratingsCount > 0 ? $ratingsSum / $ratingsCount : 0;
        $averageRating = number_format($averageRating, 1);
    
        return view('Pets.Show', compact('products', 'comments', 'averageRating'));
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'msg' => 'required',
            'rating' => 'required|integer|min:1|max:10',
        ]);
    
        $comment = comments::findOrFail($id);
    
        if ($comment->user_id === auth()->id()) {
            $comment->comments = $request->input('msg');
            $comment->rate_number = $request->input('rating');
    
            $comment->save();
    
            return redirect()->back()->with('success', 'Commentaire mis à jour avec succès.');
        } else {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à modifier ce commentaire.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $commentes = comments::find($id);
        //dd($commentes);
        $commentes->delete();
        return redirect()->back()->with('success', 'Commentaire supprimé avec succès.');
    }



    public function CommentsForFoods($id) {
        $Food = Food::findOrFail($id);
        $comments = comments::where('food_id', $id)->get();
        //dd($comments);
        return view('Pets.showFood', compact('Food', 'comments'));
    }


        public function storeCommentForFood(Request $request, $foodId) {
            //dd($request->all());
            $validator = Validator::make($request->all(), [
                'comments' => 'required|string',
                'rate_number' => 'required|numeric|min:1|max:10',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $food = Food::findOrFail($foodId);
//dd($food);
            $comment = new comments();
            $comment->food_id = $food->id;
            $comment->user_id = auth()->user()->id;
            $comment->comments = $request->input('comments');
            $comment->rate_number = $request->input('rate_number');
            $comment->save();
   //dd($comment);
            return redirect()->back()->with('success', 'Comment added successfully!');
}



public function CommentsForAccessoir($id) {
    $accessoir = Accessoir::findOrFail($id);
    $comments = comments::where('accessoir_id', $id)->get();
    //dd($Accessoir);
    return view('Pets.ShowAccessoir', compact('comments', 'accessoir'));
}

        public function storeCommentForAccessoir(Request $request, $AccessoirId) {
//dd($request->all());
            $validator = Validator::make($request->all(), [
                'comments' => 'required|string',
                'rate_number' => 'required|numeric|min:1|max:10',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $Accessoir = Accessoir::findOrFail($AccessoirId);
//dd($food);
            $comment = new comments();
            $comment->accessoir_id  = $Accessoir->id;
            $comment->user_id = auth()->user()->id;
            $comment->comments = $request->input('comments');
            $comment->rate_number = $request->input('rate_number');
            $comment->save();
   dd($comment);
            return redirect()->back()->with('success', 'Comment added successfully!');

        }
}


