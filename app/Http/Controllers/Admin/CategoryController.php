<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategorySlider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function showAllCategories(Request $request)
    {
        $search_name = $request->query('search');
        $status = $request->query('status');
        $order_by = $request->query('order_by');
        $sort_by_slider = $request->query('sort_by_slider');
        $sort_by_carousel = $request->query('sort_by_carousel');


        $categories = Category::withCount('products')
            ->when($search_name, function ($query) use ($search_name) {
                $query->where('cat_name', 'LIKE', "%$search_name%");
            })
            ->when($status, function ($query) use ($status) {
                if ($status === 'active') {
                    $query->where('published', true);
                } else {
                    $query->where('published', false);
                }
            })
            ->when($order_by, function ($query) use ($order_by) {
                if ($order_by === 'newest') {
                    $query->orderBy('id', 'desc');
                } else {
                    $query->orderBy('id', 'asc');
                }
            })
            ->when($sort_by_slider, function ($query) use ($sort_by_slider) {
                if ($sort_by_slider === 'true') {
                    $query->whereNot('cat_slider', null);
                } else {
                    // $query->where('cat_slider', '===', null);
                    $query->where('cat_slider', null);
                }
            })
            ->when($sort_by_carousel, function ($query) use ($sort_by_carousel) {
                if ($sort_by_carousel === 'true') {
                    $query->where('isSliderForCarousel', true);
                } else {
                    $query->where('isSliderForCarousel', false);
                }
            })
            ->orderByDesc('id')->paginate(5)->withQueryString();
        return Inertia::render('Admin/Category/CategoryView', [
            'categories' => CategoryResource::collection($categories),
        ]);
    }


    public function createCategoryPage(Request $request)
    {
        return Inertia::render('Admin/Category/CreateCategory');
    }

    public function updateCategoryPage(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        return Inertia::render('Admin/Category/UpdateCategory', [
            'category' => $category
        ]);
    }



    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id); // Removed 'with' for simplicity
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'category_logo' => 'nullable|image|mimes:png,jpg,jpeg',
            'category_slider' => 'nullable|image|mimes:png,jpg,jpeg',
            'carousel' => 'required|boolean',
        ]);

        DB::beginTransaction();
        try {
            $cat_logo_path = $category->cat_logo; // Default to existing path
            $cat_slider_image_path = $category->cat_slider; // Default to existing path

            if ($request->hasFile('category_logo')) {
                $cat_image = $request->file('category_logo');
                if ($category->cat_logo && Storage::disk('public')->exists($category->cat_logo)) {
                    Storage::disk('public')->delete($category->cat_logo);
                }
                $cat_image_name = time() . '-' . uniqid() . '.' . $cat_image->getClientOriginalExtension();
                $cat_logo_path = $cat_image->storeAs('category_logo', $cat_image_name, 'public');
            }

            if ($request->hasFile('category_slider')) {
                $cat_slider_image = $request->file('category_slider');
                if ($category->cat_slider && Storage::disk('public')->exists($category->cat_slider)) {
                    Storage::disk('public')->delete($category->cat_slider);
                }
                $cat_slider_image_name = time() . '-' . uniqid() . '.' . $cat_slider_image->getClientOriginalExtension();
                $cat_slider_image_path = $cat_slider_image->storeAs('category_slider', $cat_slider_image_name, 'public');
            }

            // Update category with all relevant data
            $category->update([
                'cat_name' => $validatedData['category_name'],
                'slug' => Str::slug($validatedData['category_name']),
                'cat_logo' => $cat_logo_path,
                'published' => $validatedData['status'],
                'cat_slider' => $cat_slider_image_path,
                'isSliderForCarousel' => $validatedData['carousel'],
            ]);

            DB::commit();
            return to_route('page.categoryView')->with('success', 'Category updated successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // Log the exception if needed: Log::error($th);
            return redirect()->back()->with('error', $th->getMessage());
        }
    }















    public function storeCategory(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories,cat_name|max:255',
            'status' => 'required|boolean',
            'category_logo' => 'required|image|mimes:png,jpg,jpeg',
            'category_slider' => 'nullable|image|mimes:png,jpg,jpeg',
            'carousel' => 'nullable|boolean',
        ]);

        DB::beginTransaction();
        try {
            $cat_logo_path = null; // Initialize the variable to avoid undefined errors
            if ($request->hasFile('category_logo')) {
                $cat_logo = $request->file('category_logo');
                $cat_logo_name = time() . '-' . uniqid() . '.' . $cat_logo->getClientOriginalExtension();
                $cat_logo_path = $cat_logo->storeAs('category_logo', $cat_logo_name, 'public');
            }

            $cat_slider_path = null; // Initialize the variable to avoid undefined errors
            if ($request->hasFile('category_slider')) {
                $cat_slider = $request->file('category_slider');
                $cat_slider_name = time() . '-' . uniqid() . '.' . $cat_slider->getClientOriginalExtension();
                $cat_slider_path = $cat_slider->storeAs('category_slider', $cat_slider_name, 'public');
            }

            // Create the category
            Category::create([
                'cat_name' => $validatedData['category_name'],
                'cat_logo' => $cat_logo_path,
                'slug' => Str::slug($validatedData['category_name']),
                'published' => $validatedData['status'],
                'cat_slider' => $cat_slider_path,
                'isSliderForCarousel' => $validatedData['carousel'] ?? false,
            ]);

            DB::commit();
            return back()->with('success', 'Category created successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // Log the error for debugging purposes
            \Log::error('Error creating category: ', ['error' => $th->getMessage()]);
            return back()->with('error', 'An error occurred while creating the category. Please try again.');
        }
    }




    public function deleteCategory(Request $request, $id)
    {

        $category = Category::with(['products'])->findOrFail($id);
        DB::beginTransaction(); // Start a transaction
        try {

            $category->products()->detach();

            if ($category->cat_logo && Storage::disk('public')->exists($category->cat_logo)) {
                Storage::disk('public')->delete($category->cat_logo);
            }

            if ($category->cat_slider && Storage::disk('public')->exists($category->cat_slider)) {
                Storage::disk('public')->delete($category->cat_slider);
            }

            $category->delete();
            DB::commit();
            return back()->with('success', 'Category deleted successfully.');

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction on failure

            // Log the error for debugging purposes
            // Log::error('Error deleting category: ' . $e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }









}
