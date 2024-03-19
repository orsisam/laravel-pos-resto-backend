<?php

namespace App\Services;

use App\Models\Product;


class ProductService
{
    /**
     * @param array<int,mixed> $data
     */
    public function store(array $data): Product
    {
        $product = new Product();
        $product->name = $data['name'];
        $product->category_id = $data['category'];
        $product->price = $data['price'];
        $product->stock = $data['stock'];
        $product->description = $data['description'];

        if (isset($data['status'])) {
            $product->status = true;
        }

        if (isset($data['favorite'])) {
            $product->is_favorite = true;
        }

        $product->save();

        return $product;
    }

    /**
     * Updating Product
     * 
     * @param array<int,mixed> $data
     */
    public function update(array $data, Product $product): Product
    {
        $product->name = $data['name'];
        $product->category_id = $data['category'];
        $product->price = $data['price'];
        $product->stock = $data['stock'];
        $product->description = $data['description'];

        if (isset($data['status'])) {
            $product->status = true;
        } else {
            $product->status = false;
        }

        if (isset($data['favorite'])) {
            $product->is_favorite = true;
        } else {
            $product->is_favorite = false;
        }

        $product->save();

        return $product;
    }
}
