<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::paginate(10);
        return view('DashbordAdmin.Products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Products $product)
    {
        $IsUpdte = false;
        return view('DashbordAdmin.Products.form' , compact('IsUpdte' , 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductsRequest $admin)
    {
        $data = $admin->validated();
        if($admin->hasFile('image')){
        $data['image'] = $admin->file('image')->store('Products', 'public');

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
        return view('DashbordAdmin.Products.form' , compact('IsUpdte' , 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
