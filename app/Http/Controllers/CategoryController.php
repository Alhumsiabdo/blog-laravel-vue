<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return Category::query()->select('id', 'name')->latest()->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $name = $request->input('name');
        $category = new Category();
        $category->name = $name;

        return $category->save();
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $name = $request->input('name');
        $category->name = $name;

        return $category->save();
    }

    public function destroy(Category $category)
    {
        return $category->delete();
    }
}
