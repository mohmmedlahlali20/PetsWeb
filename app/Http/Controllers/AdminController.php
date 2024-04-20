<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use App\Models\payment;
use App\Models\commends;
use App\Models\comments;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductsRequest;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::with('comments')->paginate(5);    
        $is_command = [];
        $productRates = [];
        foreach ($products as $product) {
            $is_command[$product->id] = commends::where('products_id', $product->id)->exists();
    
            $comments = comments::where('products_id', $product->id)->get();
    
            $totalRateNumer = $comments->sum('rate_numer');
            $commentsCount = $comments->count();
    
            $averageRateNumer = $commentsCount > 0 ? $totalRateNumer / $commentsCount : 0;
    
            $productRates[$product->id] = $averageRateNumer;
        }
    
        return view('DashbordAdmin.Products.index', compact('products', 'is_command', 'productRates'));
    }
    
    
    

    public function GetCommands(){
        $commands = commends::withTrashed()->paginate(5);
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
         //dd($admin);
         $data = $admin->validated();
         
         if ($admin->hasFile('image')) {
             $data['image'] = $admin->file('image')->store('Products', 'public');
         }
     

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

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            

            $validatedData['image'] = $imagePath;
        }

        $product->update($validatedData);
    

        return redirect()->route('product.index')->with('success' , 'Product updated successfully');
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

    public function getOrder(){
        $orders = commends::with('comments')->paginate(4);
        return view('DashbordAdmin.commandAdmin.index', compact('orders'));
    }
    

    public function AdminCancelCommand($id){
        $cancel = commends::find($id);
        //dd($cancel);
        if($cancel){
            $cancel->delete(); 
            return redirect()->back()->with('success', 'Command cancelled successfully');
        } else {
            return redirect()->back()->with('error', 'this command already cancled , or not exist in database ');
        }
    }
    
}
