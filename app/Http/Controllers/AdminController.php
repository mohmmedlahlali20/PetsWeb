<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use App\Models\commends;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductsRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::paginate(5);
        
       
        return view('DashbordAdmin.Products.index', compact('products'));

    }

    public function GetCommands(){
        $commands = commends::paginate(4);
        return view('DashbordAdmin.commandAdmin.index', compact('commands'));
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
   
     public function store(ProductsRequest $admin)
     {
         //
         $data = $admin->validated();
         if ($admin->hasFile('image')) {
             $data['image'] = $admin->file('image')->store('Products', 'public');
         }
     
         // Ensure 'category_id' is provided in $data
         $data['category_id'] = $admin->category_id;
     
         Products::create($data);
         //dd($data);
         return redirect()->back()->with('success', 'Product is added successfully');
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


    public function getStats()
    {
        $userCount = User::count();
        $productCount = Products::count();
        $categoryCount = Categories::count();
//dd($userCount );
        return view('Layouts.Admin' , compact('userCount',
        'productCount',
        'categoryCount'));
    }
    
}
