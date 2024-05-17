<?php

namespace App\Http\Controllers;

use App\Helpers\FileUpload;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $products = Product::paginate();

        return view('product.index', compact('products'))
            ->with('i', ($request->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $product = new Product();
        $categories = Category::all();

        return view('product.create', compact('product', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        $file["image"] = FileUpload::file_upload('products', $request->file('image_file'));

        Product::create(array_merge($request->validated(), $file));

        return Redirect::route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $categories = Category::all();
        $product = Product::find($id);

        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        if (!empty($request->file('image_file'))){
            $file["image"] = FileUpload::file_upload('products', $request->file('image_file'), $product->image);
        }else{
            $file["image"] = $product->image;
        }
        $product->update(array_merge($request->validated(), $file));

        return Redirect::route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Product::find($id)->delete();

        return Redirect::route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
