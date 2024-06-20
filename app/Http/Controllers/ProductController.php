<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrandResource;
use Inertia\Inertia;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProductDetails(Request $request)
    {

        $product_slug = $request->query('product');
        $product = Product::with(['categories', 'brand'])->where('slug', $product_slug)->firstOrFail();
        // get product by multiple categories


        $category_ids = [];
        foreach ($product->categories as &$category) {
            array_push($category_ids, $category->id);
        }

        $related_products = Product::whereHas('categories', function ($query) use ($category_ids) {
            $query->whereIn('categories.id', $category_ids);
        }, '=', count($category_ids))->get();




        return Inertia::render('Guest/ProductDetails', [
            'product' => $product,
            'related_products' => $related_products
        ]);
    }



    public function getProductsByCategory(Request $request, $slug)
    {

        $category = Category::where('slug', $slug)->firstOrFail();
        $brands = Brand::get();
        return Inertia::render('Guest/SortingProducts', [
            'products' => $category->products,
            'brands' => BrandResource::collection($brands)
        ]);
    }


    public function getProductsByBrand(Request $request, $slug)
    {
        $brand = Brand::with('products')->where('slug', $slug)->firstOrFail();
        $products = $brand->products;
        return Inertia::render('Guest/SortingProducts', [
            'products' => $products
        ]);

    }





}
