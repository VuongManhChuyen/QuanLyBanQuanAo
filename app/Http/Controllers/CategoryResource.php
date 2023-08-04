<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::get();

        return response()->json($category);
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
        $name_category = $request->input('name_category'); 
       
        $data = [
            'name_category' => $name_category,
        ];
        $category = Category::create($data);
        
        return response()->json($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $Category)
    {
        return response()->json($Category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $Category)
    {
        $category = $request->input('name_category');
        $Category->name_category = $category;
        $Category->save();
        return response()->json($Category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $Category)
    {
        $Category->delete();

        return response(['message' => 'Category successful']);
    }
}