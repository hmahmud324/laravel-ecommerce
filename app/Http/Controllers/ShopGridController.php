<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopGridController extends Controller
{
    public function index()
    {
        return view('website.home.index', [
            'trending_products' => Product::where('featured_status', 1)->get(),
        ]);
    }

    public function category($id)
    {
        return view('website.category.index', ['products' => Product::where('category_id', $id)->get()]);
    }

    public function subCategory($id)
    {
        return view('website.category.index', ['products' => Product::where('sub_category_id', $id)->get()]);
    }

    public function details($id)
    {
        return view('website.product.details', ['product' => Product::find($id)]);
    }


    public function product()
    {
        return view('website.product.index');
    }

}
