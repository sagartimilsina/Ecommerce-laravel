<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(20);
        return view('backend.category.main', compact('categories'));
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

        $request->validate([
            'category_name' => 'required|max:255',
            'category_description' => 'nullable|string',
        ]);
        try {
            Category::create($request->all());
            notify()->success('Category created successfully!');
            return back();
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        $request->validate([
            'category_name' => 'required|max:255',
            'category_description' => 'nullable|string',
        ]);
        try {
            $category->update($request->all());
            notify()->success('Category updated successfully!');
            return back();
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        try {
            $category->delete();
            notify()->success('Category deleted successfully!');
            return back();
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return back()->withErrors($e->getMessage())->withInput();
        }
    }
}
