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
     $user =Auth::user();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'quantity' => 'required|integer|min:1',
        ]);

    
        //$imagePath = $request->file('image')->store('public/images'); 
        //$imageName = basename($imagePath); 
        $food = new Food();
        $food->name = $validatedData['name'];
        $food->price = $validatedData['price'];
        //$food->image = $imageName; 
        $food->quantity = $validatedData['quantity'];
        $food->user_id = $user->id;
        $food->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Food item added successfully.');
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
