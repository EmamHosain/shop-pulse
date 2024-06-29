<?php

namespace App\Http\Controllers\Admin;


use Redirect;
use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function productView(Request $request)
    {
        $search = $request->query('search');
        $category = $request->query('category');
        $brand = $request->query('brand');
        $price = $request->query('price');
        $discount_price = $request->query('dis_price');
        $discount_amount = $request->query('dis_amount');
        $stock = $request->query('stock');
        $discount_percentage = $request->query('dis_percentage');
        $status = $request->query('status');






        $products = Product::with(['categories', 'brand', 'productImages'])
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'LIKE', "%$search%");
            })
            ->when($price, function ($query) use ($price) {
                $query->orderBy('price', $price);
            })
            ->when($discount_price, function ($query) use ($discount_price) {
                $query->orderBy('discount_price', $discount_price);
            })
            ->when($discount_amount, function ($query) use ($discount_amount) {
                $query->orderBy('discount_amount', $discount_amount);
            })
            ->when($stock, function ($query) use ($stock) {
                $query->orderBy('quantity', $stock);
            })
            ->when($discount_percentage, function ($query) use ($discount_percentage) {
                $query->orderBy('discount_percentage', $discount_percentage);
            })
            ->when($status, function ($query) use ($status) {
                if ($status === 'active') {
                    $query->where('published', true);
                } else {
                    $query->where('published', false);
                }
            })
            ->when($category, function ($query) use ($category) {
                // products and categoris they are many to many relationship, get products where $product->slug === $category->slug
                $query->whereHas('categories', function ($query) use ($category) {
                    $query->where('slug', $category);
                });
            })
            ->when($brand, function ($query) use ($brand) {
                $query->whereHas('brand', function ($query) use ($brand) {
                    $query->where('slug', $brand);
                });
            })
            ->orderByDesc('id')->paginate(10);





        return Inertia::render('Admin/Product/ProductView', [
            'products' => $products
        ]);
    }


    public function createProduct()
    {
        return Inertia::render('Admin/Product/CreateProduct');
    }



    public function storeProduct(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|unique:products,title,except,id|string|max:255',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'brand' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'categories' => 'required|array|exists:categories,id',

            'images' => 'required',
            'images.*' => 'required|mimes:jpeg,png,jpg',
            'discount_percentage' => 'required|numeric'
        ]);
        DB::beginTransaction();
        try {
            // Create a new product
            $product = Product::create([
                'title' => $validatedData['title'],
                'slug' => Str::slug($validatedData['title']),
                'stock_count' => $validatedData['quantity'],
                'inStock' => (int) $validatedData['quantity'] > 0 ? true : false,
                'short_description' => $validatedData['short_description'],
                'long_description' => $validatedData['long_description'],
                'price' => $validatedData['price'],
                'quantity' => $validatedData['quantity'],
                'brand_id' => $validatedData['brand'],
                'published' => $validatedData['status'],
                'discount_percentage' => $validatedData['discount_percentage'],
                'discount_price' => Product::getDiscountPrice($validatedData['price'], $validatedData['discount_percentage']),
                'discount_amount' => Product::getDiscountAmount($validatedData['price'], $validatedData['discount_percentage']),
            ]);

            // Attach categories to the product
            $product->categories()->attach($validatedData['categories']);



            $imagePaths = [];
            $pathName = $product->id;

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {

                    $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $imagePath = $image->storeAs('products/' . $pathName, $imageName, 'public');
                    $imagePaths[] = $imagePath;

                }
            }
            foreach ($imagePaths as &$path) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $path
                ]);
            }


            DB::commit();
            return Redirect::back()->with('success', 'product created successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return Redirect::back()->with('error', $th->getMessage());
        }
    }


    public function getUpdateProductPage(Request $request, $id)
    {
        $product = Product::with(['categories', 'brand', 'productImages'])->findOrFail($id);
        $catIds = [];
        foreach ($product->categories as &$category) {
            $catIds[] = $category->id;
        }

        return Inertia::render('Admin/Product/UpdateProduct', [
            'product' => $product,
            'catIds' => $catIds
        ]);
    }




    public function updateProduct(Request $request, $id)
    {

        // return $request->all();
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'brand' => 'required',
            'status' => 'required',
            'categories' => 'required|array|exists:categories,id',

            // 'images' => 'required',
            'images.*' => 'mimes:jpeg,png,jpg',
            'discount_percentage' => 'required|numeric'
        ]);

        DB::beginTransaction();
        try {
            $product->update([
                'title' => $validatedData['title'],
                'slug' => Str::slug($validatedData['title']),
                'stock_count' => $validatedData['quantity'],
                'inStock' => (int) $validatedData['quantity'] > 0 ? true : false,
                'short_description' => $validatedData['short_description'],
                'long_description' => $validatedData['long_description'],
                'price' => $validatedData['price'],
                'quantity' => $validatedData['quantity'],
                'brand_id' => $validatedData['brand'],
                'published' => $validatedData['status'],
                'discount_percentage' => $validatedData['discount_percentage'],
                'discount_price' => Product::getDiscountPrice($validatedData['price'], $validatedData['discount_percentage']),
                'discount_amount' => Product::getDiscountAmount($validatedData['price'], $validatedData['discount_percentage']),
            ]);

            // Update categories using sync to prevent duplicates
            $product->categories()->sync($validatedData['categories']);

            $imagePaths = [];
            $pathName = $product->id;

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {

                    $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $imagePath = $image->storeAs('products/' . $pathName, $imageName, 'public');
                    $imagePaths[] = $imagePath;

                }
                foreach ($imagePaths as &$path) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $path
                    ]);
                }

            }

            DB::commit();
            return to_route('page.productView')->with('success', 'Product updated successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }





    public function deleteProduct(Request $request, $id)
    {

        DB::beginTransaction();
        try {
            // Find the product with its relationships
            $product = Product::with(['categories', 'productImages'])->findOrFail($id);

            // Detach the categories
            $product->categories()->detach();

            // Assuming the images are stored in a folder named by the product ID
            $folderPath = "products/{$product->id}";

            // Check if the folder exists before attempting to delete
            if (Storage::disk('public')->exists($folderPath)) {
                // Delete the folder and all its contents
                Storage::disk('public')->deleteDirectory($folderPath);
            } else {
                // Log a warning if the folder does not exist
                // return false;
                Log::warning("Folder for product ID {$product->id} does not exist.");
            }

            // Delete the product record from the database
            $product->delete();
            DB::commit();
            return back()->with('success', 'Product deleted successfully');

        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete product. Please try again later.');
        }
    }



}
