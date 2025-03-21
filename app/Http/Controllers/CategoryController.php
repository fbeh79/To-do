<?php

namespace App\Http\Controllers;

use App\Models\Category; // اصلاح نام مدل
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index',compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255'
        ]);

        category::create([
            'title' => $request->title
        ]);
        return redirect()->route('Category.index');
    }
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }
    public function update(Request $request, Category $category){
        $request->validate(['title' => 'required|max:255']);
        $category->update(['title'=>$request->title]);
        return redirect()->route('Category.index');

    }
    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('Category.index');
    }
}
