<?php

namespace App\Http\Controllers;

use App\Models\commends;
use App\Models\comments;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('query');
        $category = $request->input('category');
        $sex = $request->input('sex');
        $age = $request->input('age'); 
    
        $productsQuery = Products::query();
    
        if (!empty($search)) {
            $productsQuery->where('name', 'LIKE', '%' . $search . '%')
                          ->orWhere('price', 'LIKE', '%' . $search . '%');
        }
    
        if (!empty($category)) {
            $productsQuery->where('category_id', $category);
        }
    
        if (!empty($sex)) {
            $productsQuery->where('sex', $sex);
        }
    
        if (!empty($age)) {
            if ($age == '2-6') {
                $productsQuery->whereBetween('age', [2, 6]);
            } elseif ($age == '7-10') {
                $productsQuery->whereBetween('age', [7, 10]);
            } elseif ($age == '10+') {
                $productsQuery->where('age', '>', 10);
            }
        }
    
        $products = $productsQuery->orderBy('created_at', 'DESC')->get();
    
        $categories = Categories::with('Products')->has('Products')->get();
    
        $userId = Auth::id();
        $userCommandCount = commends::where('user_id', $userId)->count();
    
              
        return view('welcome', compact('products', 'categories' , 'userCommandCount'));
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
    public function show(Request $request, $id)
    {
        
        $products = Products::findOrFail($id);
    //dd($products);
         $comments = comments::all();
        return view('Pets.Show', compact('products','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        //
    }


    public function likeProduct(Request $request) {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez vous connecter pour liker un produit.');
        }
    
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);
    
        $product = Product::findOrFail($request->product_id);
    
        $product->increment('likes');
    
        return redirect()->back();
    }
    
    
    
}
