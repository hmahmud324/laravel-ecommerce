<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Store a newly created resource in storage.
     */
    private $product, $products, $message;

    public function index()
    {
        $this->products = Product::all();
        return view('admin.product.manage', ['products' => $this->products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.index', [
            'categories'        => Category::all(),
            'sub_categories'    => SubCategory::all(),
            'brands'            => Brand::all(),
            'units'             => Unit::all(),
        ]);
    }

    public function store(Request $request)
    {
        $this->product = Product::newProduct($request);
        OtherImage::newOtherImage($request->other_image, $this->product->id);
        return back()->with('message', 'Product Info created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show', ['product' => $product]);
    }


    public function updateStatus($id)
    {
        $this->message = Product::updateFeaturedStatus($id);
        return back()->with('message', $this->message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'product'           => $product,
            'categories'        => Category::all(),
            'sub_categories'    => SubCategory::all(),
            'brands'            => Brand::all(),
            'units'             => Unit::all(),
        ]);
    }

    public function getSubCategoryByCategory()
    {
        return response()->json(SubCategory::where('category_id', $_GET['id'])->get());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        Product::updateProduct($request, $product->id);
        if ($request->other_image) {
            OtherImage::updateOtherImage($request, $product->id);
        }
        return redirect('/product')->with('message', 'Product info updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::deleteProduct($product->id);
        OtherImage::deleteOtherImage($product->id);
        return back()->with('message', 'Product Info deleted Successfully.');
    }


}
