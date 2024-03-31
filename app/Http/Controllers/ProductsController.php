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
        $sex = $request->input('sex');
        $age = $request->input('age'); 
    
        $productsQuery = Products::query();
    
        if (!empty($search)) {
            $productsQuery->where('name', 'LIKE', '%' . $search . '%')
                          ->orWhere('price', 'LIKE', '%' . $search . '%');
        }
    
        if (!empty($category)) {
            $productsQuery->whereIn('category_id', $category);
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
    

        $products =  $productsQuery->orderBy('created_at', 'DESC')->paginate(4);

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
    public function show(Request $request, $id)
    {
        
        $products = Products::findOrFail($id);
    //dd($products);
        return view('Pets.Show', compact('products'));
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
