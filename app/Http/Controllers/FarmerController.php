<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Farm;
use App\Category;
use App\Product;
use App\Product_slider;

class FarmerController extends Controller
{
    public function index()
    {
        $farms = Farm::where('user_id', Auth::user()->id)->get();
        return view('farmer.index', compact('farms'));
    }

    public function create(Request $request)
    {
        $farm = new Farm();
        $farm->name = $request->name;
        $farm->description = $request->description;
        $farm->location = '';
        $farm->user_id = Auth::user()->id;
        $farm->save();
        return redirect()->back()->with('status', 'Create farm was successful!');
    }

    public function show($id)
    {
        $farms = Farm::where('user_id', Auth::user()->id)->where('id', $id)->get();
        $categories = Category::all();
        return view('farmer.farm', compact('farms', 'categories'));
    }

    public function product_store(Request $request, $id)
    {
        $product = new Product();
        if ($request->hasFile('product_img') and $request->file('product_img')->isValid()) {
            $product->image = $request->product_img->getClientOriginalName();
            $request->product_img->move('../public/data/farm/'.$request->farm_name, $request->product_img->getClientOriginalName());
        } else {
            $product->image = 'default.jpg';
        }
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->farm_id = $id;
        $product->save();
        return redirect()->back()->with('status', 'Product was add successful!');
    }

    public function farm_edit($id)
    {
        $farms = Farm::where('user_id', Auth::user()->id)->where('id', $id)->get();
        return view('farmer.farm_edit', compact('farms'));
    }

    public function farm_update(Request $request)
    {
        $farm = Farm::find($request->id);
        $farm->name = $request->name;
        $farm->description = $request->description;
        $farm->location = '';
        $farm->save();
        return redirect()->route('farm', ['id' => $request->id])->with('farm_status', 'Farm update successful!');
    }

    public function product_edit($farm_id, $product_id)
    {
        if ( in_array($farm_id, array_pluck(Auth::user()->farms()->get(), 'id'))) {
            $products = Product::where('farm_id', $farm_id)->where('id', $product_id)->get();
            $categories = Category::all();
            return view('farmer.product_edit', compact('products', 'categories'));
        }
        return redirect()->back();
    }

    public function product_update(Request $request)
    {
        $product = Product::find($request->id);
        if ($request->hasFile('product_img') and $request->file('product_img')->isValid()) {
            unlink('../public/data/farm/'.$request->farm_name.'/'.$product->image);
            $product->image = $request->product_img->getClientOriginalName();
            $request->product_img->move('../public/data/farm/'.$request->farm_name, $request->product_img->getClientOriginalName());
        }
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('farm', ['id' => $product->farm_id])->with('status_product_'.$request->id, 'Product update successful!');
    }

    public function farm_destroy(Request $request)
    {
        $farm = Farm::find($request->id);
        $farm->delete();
        return redirect('/farmer')->with('farm_destrot', 'Farm destroy successful!');
    }

    public function product_img_slider(Request $request)
    {
        $slider = new Product_slider();
        if ($request->hasFile('slider_img') and $request->file('slider_img')->isValid()) {
            $slider->image = $request->slider_img->getClientOriginalName();
            $request->slider_img->move('../public/data/farm/'.$request->farm_name.'/slider/product_id_'.$request->product_id, $request->slider_img->getClientOriginalName());
            $slider->product_id = $request->product_id;
            $slider->save();
            return redirect()->back()->with("slider_status", 'Add image to product slider was successful!');
        }
        return redirect()->back()->with("slider_status", 'Add image to product slider failled!');
    }

    public function product_img_slider_delete($id)
    {
        $slider = Product_slider::find($id);
        $slider->delete();
        return redirect()->back()->with('slider_status', 'Delete image from product slider failled!');
    }
}