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



    public function getProductsByCategory(Request $request)
    {




        $category_slug = $request->query('category');
        $category = Category::where('slug', $category_slug)->firstOrFail();
        $brand_slug = $request->query('brand');
        $brands = Brand::get();
        $brand_id = $brands->where('slug', $brand_slug)->value('id');



        $orderBy = $request->query('order_by');
        $minPrice = $request->query('price', 1);
        $maxPrice = $request->query('to', 10000);


        $page_size = $request->query('page_size') ?? 12;


        $products = $category->products()
            ->when($orderBy, function ($query) use ($orderBy) {
                if ($orderBy === 'a-z') {
                    $query->orderBy('title', 'asc');
                }
                if ($orderBy === 'z-a') {
                    $query->orderBy('title', 'desc');
                }
                if ($orderBy === 'low-to-high') {
                    $query->orderByRaw('CASE WHEN discount_price  THEN CAST(discount_price AS DECIMAL(10,2)) ELSE CAST(price AS DECIMAL(10,2)) END ASC');
                }
                if ($orderBy === 'high-to-low') {
                    $query->orderByRaw('CASE WHEN discount_price  THEN CAST(discount_price AS DECIMAL(10,2)) ELSE CAST(price AS DECIMAL(10,2)) END DESC');
                }
            })
            ->when($minPrice || $maxPrice, function ($query) use ($minPrice, $maxPrice) {
                if ($minPrice && $maxPrice) {
                    $query->whereRaw('CASE WHEN discount_price THEN CAST(discount_price AS DECIMAL(10,2)) ELSE CAST(price AS DECIMAL(10,2)) END BETWEEN ? AND ?', [$minPrice, $maxPrice]);
                } elseif ($minPrice) {
                    $query->whereRaw('CASE WHEN discount_price THEN CAST(discount_price AS DECIMAL(10,2)) ELSE CAST(price AS DECIMAL(10,2)) END >= ?', [$minPrice]);
                } elseif ($maxPrice) {
                    $query->whereRaw('CASE WHEN discount_price THEN CAST(discount_price AS DECIMAL(10,2)) ELSE CAST(price AS DECIMAL(10,2)) END <= ?', [$maxPrice]);
                }
            })
            ->when($brand_id, function ($query) use ($brand_id) {
                $query->where('brand_id', $brand_id);
            })
            ->paginate($page_size)->withQueryString();



        return Inertia::render('Guest/SortingProducts', [
            'products' => $products,
            'brands' => BrandResource::collection($brands),
            'selectedCategorySlug' => $category->slug,
            
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
