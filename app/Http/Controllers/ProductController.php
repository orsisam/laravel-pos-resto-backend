<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|Factory
    {
        $products = Product::when($request->input('name'), function ($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })
            ->orderBy('name')
            ->paginate(10);

        return view('pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $arrayCategory = Category::pluck('id')->all();
    //     dd($request->validate([
    //         'name' => 'required',
    //         'category' => ['required', Rule::in($arrayCategory)],
    //         'price' => 'required',
    //         'stock' => 'required',
    //         'description' => 'max:255',
    //         'status' => 'boolean',
    //         'favorite' => 'boolean',
    //     ]));
    // }

    public function store(ProductStoreRequest $request, ProductService $productService)
    {
        $newProduct = $productService->store($request->all());

        return to_route('products.index')->with('success', "Product {$newProduct} successfully created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $data = array();
        $data['product'] = $product;
        $data['categories'] = Category::all();

        return view('pages.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): void
    {
        //
    }
}
