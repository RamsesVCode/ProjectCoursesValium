<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:40',
            'description' => 'required|min:20|max:100',
        ]);
        Category::create($request->all());
        return redirect()->route('admin.categories.index')
            ->with('success','Categoria creada exitosamente');
    }
    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:5|max:40',
            'description' => 'required|min:20|max:100',
        ]);
        $category->update($request->all());
        return redirect()->route('admin.categories.index')
            ->with('success','Categoria actualizada exitosamente');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success','Categoria eliminada exitosamente');
    }
}
