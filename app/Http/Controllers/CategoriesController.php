<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryREquest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Categories::paginate(5);
        
        return view('DashbordAdmin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $IsUpdte = false;
        return view('DashbordAdmin.category.form' , compact('IsUpdte'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryREquest $category)
    {
        //dd($category);
        $data = $category->validated();
        Categories::create($data);
        //dd($data);
        return  redirect()->route('category.index')->with('success' , 'Product is add successfuly');

    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $category)
{
    $products = $category->products()->get();
   //dd($products);
   return view('DashbordAdmin.category.categoryShow' , compact('products' , 'category'));
}
 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $category)
    {
        $IsUpdte = true;
        //dd($category);
        return view('DashbordAdmin.category.form' , compact('IsUpdte' , 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryREquest $request, Categories $categories)
    {
        $validatedData = $request->validated();
      
        $categories->update($validatedData);

        //$product->update($validatedData);
         return redirect()->route('category.index')->with('success' , 'Category is update successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {
        //dd($category);
        $category->delete();
        return redirect()->back()->with('success' , 'Category is deleted');
    }
}
