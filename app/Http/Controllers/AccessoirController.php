<?php

namespace App\Http\Controllers;

use App\Models\Accessoir;
use App\Models\Categories;
use Illuminate\Http\Request;

class AccessoirController extends Controller
{

    public function getAccessoir(){
        $Accessoir = Accessoir::all();
        return view('DashbordAdmin.Accessoir.index' , compact('Accessoir'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Accessoir = Accessoir::all();
        //dd($Accessoir);
        $categories = Categories::with('Products')->has('Products')->get();
        return view('welcome' , compact('Accessoir','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DashbordAdmin.Accessoir.form');
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
        //$user = Auth::user();
             $validatedData = $request->validate([
             'name' => 'required|string|max:255',
             'price' => 'required|numeric',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
             'quantity' => 'required|integer',
         ]);
     
         if ($request->hasFile('image')) {
             $imagePath = $request->file('image')->store('public/Accessoir');
             $validatedData['image'] = $imagePath;
         }
     
         $accessory = new Accessoir($validatedData);
     
         $accessory->save();
     
         return redirect()->back()->with('success', 'Accessory added successfully.');
     }

    /**
     * Display the specified resource.
     */
    public function show(Accessoir $accessoir)
    {
        //dd($accessoir);
        return view('Pets.ShowAccessoir' , compact('accessoir'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accessoir $accessoir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accessoir $accessoir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accessoir $accessoir)
    {
        //
    }
}
