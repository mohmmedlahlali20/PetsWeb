<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::with('Categories')->paginate(10);
        
       
        return view('DashbordAdmin.Products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Products $product)
    {
        $IsUpdte = false;
        $category = Categories::all();
        return view('DashbordAdmin.Products.form' , compact('IsUpdte' , 'product' , 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductsRequest $product)
    {
        $data = $product->validated();
        $categoryId = $product->input('category');
        $data['category_id'] = $categoryId;
        if($product->hasFile('image')){
        $data['image'] = $product->file('image')->store('Products', 'public');

        }

        Products::create($data);
        //dd($data);
        return  redirect()->route('product.index')->with('success' , 'Product is add successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $product)
    {
        $IsUpdte = true;
        //dd( $product);
        $category = Categories::all();
        return view('DashbordAdmin.Products.form' , compact('IsUpdte' , 'product' , 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductsRequest $request, Products $product)
    {
        $validatedData = $request->validated();
        $product->category_id = $validatedData['category'];
        $product->update($validatedData);

        //$product->update($validatedData);
         return redirect()->route('product.index')->with('success' , 'Product is update successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        //dd($product);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
    
}
