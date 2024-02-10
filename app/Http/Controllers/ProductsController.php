<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index2()
    {
        $products = Products::all();
        return view('index2', compact(['products']));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // dd($request->except(['_token', 'submit']));
        Products::create($request->except(['_token', 'submit']));
        return redirect('/products')->with('success', 'Products added successfully');
    }

    public function edit($id)
    {
        $products = Products::find($id);
        return view('edit', compact(['products']));
    }

    public function update($id, Request $request)
    {
        $products = Products::find($id);
        $products->update($request->except(['_token', 'submit']));
        return redirect('/products')->with('success', 'Products updated successfully');
    }

    public function destroy($id)
    {
        $products = Products::find($id);
        $products->delete();
        return redirect('/products')->with('success', 'Products deleted successfully');
    }
}
