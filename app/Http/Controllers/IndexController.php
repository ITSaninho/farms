<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Farm;
use App\Product;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function search(Request $request)
    {
        if( !empty($request->farm)) $farms = Farm::where('name', 'like', '%'.$request->farm.'%')->get();
        if( !empty($request->product)) $products = Product::where('name', 'like', '%'.$request->product.'%')->get();
        if( !empty($request->location)) $farms = Product::where('location', 'like', '%'.$request->location.'%')->get();

        $categories = Category::all();
        return view('search', compact('farms', 'categories', 'products'));
    }

    public function product_category($id)
    {
        $categories = Category::all();
        $get_category = Category::find($id);
        return view('product_category', compact('categories', 'get_category'));
    }

    public function farm_show($id)
    {
        $farm = Farm::find($id);
        return view('farm', compact('farm'));
    }
}
