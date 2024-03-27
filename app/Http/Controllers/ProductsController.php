<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('query');
        $category = $request->input('category');
        
        if (!empty($search)) {
            $productsQuery = Products::where('name', 'LIKE', '%' . $search . '%')
                                      ->orWhere('price', 'LIKE', '%' . $search . '%');
        } else {
            $productsQuery = Products::orderBy('created_at', 'DESC');
        }
        
        if (!empty($category)) {
            //dd($category);
            $productsQuery = Products::whereIn('category_id', $category);
        }
        
        $products = $productsQuery->paginate(4);
        $categories = Categories::with('Products')->has('Products')->get();
        
        return view('welcome', compact('products', 'categories'));
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
    public function show(Products $products)
    {
        //
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


  
}
