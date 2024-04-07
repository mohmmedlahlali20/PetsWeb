<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{

    public function GetFood(){
        $fod = Food::all();
        return view('DashbordAdmin.Food.index', compact('fod'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Foods = Food::all();
        //dd($Foods);
        $categories = Categories::with('Products')->has('Products')->get();
        return view('welcome' , compact('Foods','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DashbordAdmin.Food.Form');
    }

 
    /**
     * Store a newly created resource in storage.
     */
   
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'name' => 'required|string|max:255',
             'price' => 'required|numeric',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
             'quantity' => 'required|integer|min:1',
             
         ]);
     
         if ($request->hasFile('image')) {
             $imagePath = $request->file('image')->store('Foods', 'public');
             $imageName = basename($imagePath); 
             $validatedData['image'] = $imageName;
         }
     
         // Create the product
         Food::create($validatedData);
     
         return redirect()->back()->with('success', 'Food added successfully');
     }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        //
    }
}
