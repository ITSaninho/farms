<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Farm;
use App\Category;
use App\Product;
use App\Product_slider;
use App\User;

class AdminController extends Controller
{
    //Farm CRUD
    public function index()
    {
        $farms = Farm::all();
        $categories = Category::all();
        return view('admin.index', compact('farms', 'categories'));
    }

    public function farm_show($id)
    {
        $farm = Farm::find($id);
        return view('admin.farm_show', compact('farm'));
    }

    public function farm_create()
    {
        $users = User::all();
        return view('admin.farm_create', compact('users'));
    }

    public function farm_store(Request $request)
    {
        $farm = new Farm();
        $farm->name = $request->name;
        $farm->description = $request->description;
        $farm->location = '';
        $farm->user_id = $request->user_id;
        if ($farm->save()) return redirect('/admin')->with('status', 'Create farm was successful!');
    }

    public function farm_edit($id)
    {
        $users = User::all();
        $farm = Farm::find($id);
        return view('admin.farm_edit', compact('farm', 'users'));
    }

    public function farm_update(Request $request)
    {
        $farm = Farm::find($request->id);
        $farm->name = $request->name;
        $farm->description = $request->description;
        $farm->location = '';
        $farm->user_id = $request->user_id;
        if ($farm->save()) {
            return redirect('/admin')->with('farm_update_'.$request->id, 'Farm update successful!');
        }
    }

    public function farm_destroy(Request $request)
    {
        $farm = Farm::find($request->id);
        if ($farm->delete()) return redirect()->back()->with('status', 'Deleted farm was successful!');
    }

    //Product CRUD

    public function product_show($id, $product_id)
    {
        $product = Product::find($product_id);
        return view('admin.product_show', compact('product'));
    }

    public function product_create($farm_id)
    {
        $users = User::all();
        $categories = Category::all();
        return view('admin.product_create', compact('users', 'categories', 'farm_id'));
    }

    public function product_store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->farm_id = $request->farm_id;
        $farm = Farm::find($request->farm_id);

        if ($request->hasFile('product_img') and $request->file('product_img')->isValid()) {
            $product->image = $request->product_img->getClientOriginalName();
            $request->product_img->move('../public/data/farm/'.$farm->name, $request->product_img->getClientOriginalName());
        } else {
            $product->image = 'default.jpg';
        }

        if ($product->save()) {
            return redirect()->route('admin_product_show', ['id' => $request->farm_id, 'product_id' => $product->id])
                            ->with('status', 'Create product was successful!');
        }
    }

    public function product_edit($id, $product_id)
    {
        $users = User::all();
        $categories = Category::all();
        $product = Product::find($id);
        return view('admin.product_edit', compact('product', 'users', 'categories'));
    }

    public function product_update(Request $request)
    {
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;

        if ($request->hasFile('product_img') and $request->file('product_img')->isValid()) {
            $product->image = $request->product_img->getClientOriginalName();
            $request->product_img->move('../public/data/farm/'.$request->farm_name, $request->product_img->getClientOriginalName());
        }

        if ($product->save()) {
            return redirect()->route('admin_product_show', ['id' => $product->farm_id, 'product_id' => $product->id])
            ->with('status', 'Product update successful!');
        }
    }

    public function product_destroy(Request $request)
    {
        $product = Product::find($request->id);
        if ($product->delete()) return redirect()->back()->with('status_product', 'Deleted product was successful!');
    }
}
