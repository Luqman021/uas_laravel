<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('index', compact(['categories']));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // dd($request->except(['_token', 'submit']));
        Categories::create($request->except(['_token', 'submit']));
        return redirect('/categories')->with('success', 'Category added successfully');
    }

    public function edit($id)
    {
        $categories = Categories::find($id);
        return view('edit', compact(['categories']));
    }

    public function update($id, Request $request)
    {
        $categories = Categories::find($id);
        $categories->update($request->except(['_token', 'submit']));
        return redirect('/categories')->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $categories = Categories::find($id);
        $categories->delete();
        return redirect('/categories')->with('success', 'Category deleted successfully');
    }
}
