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
        return view('DashbordAdmin.category.create');
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
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {
        dd($category);
    }
}
