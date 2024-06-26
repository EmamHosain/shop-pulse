<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Models\Brand;
use App\Helper\DateHelper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function showAllBrands(Request $request)
    {
        $brands = Brand::withCount('products')->orderByDesc('id')->get();
        $allBrands = $brands->map(function ($brand) {
            return [
                'id' => $brand->id,
                'brand_name' => $brand->brand_name,
                'brand_logo' => $brand->brand_logo,
                'slug' => $brand->slug,
                'brand_slider' => $brand->brand_slider,
                'created_at' => DateHelper::getFormatDate($brand->created_at),
                'updated_at' => DateHelper::getFormatDate($brand->updated_at),
                'products_count' => $brand->products_count,
                'is_banner' => $brand->is_banner,
            ];
        });
        return Inertia::render(
            'Admin/Brand/BrandView',
            [
                'brand' => $allBrands
            ]
        );
    }



    public function createBrand(Request $request)
    {
        return Inertia::render('Admin/Brand/CreateBrand');
    }



    public function storeBrand(Request $request)
    {



        $data = $request->validate([
            'brand_name' => 'required|string|unique:brands,brand_name,except,id',
            'brand_logo' => 'required|image|mimes:png,jpg,jpeg',
            'brand_slider' => 'nullable|image|mimes:png,jpg,jpeg',
            'banner' => 'nullable|boolean',
            'status' => 'required|boolean'
        ]);


        try {

            $logo_path = null;
            if ($request->hasFile('brand_logo')) {
                $logo = $request->file('brand_logo');
                $logo_name = time() . '-' . uniqid() . '.' . $logo->getClientOriginalExtension();
                $logo_path = $logo->storeAs('brand_logo', $logo_name, 'public');

            }


            $brand_slider_path = null;
            if ($request->hasFile('brand_slider')) {
                $brand_slider_image = $request->file('brand_slider');
                $brand_slider_name = time() . '-' . uniqid() . '.' . $brand_slider_image->getClientOriginalExtension();
                $brand_slider_path = $brand_slider_image->storeAs('brand_slider', $brand_slider_name, 'public');
            }

            if ($logo_path !== null) {
                Brand::create([
                    'brand_name' => $data['brand_name'],
                    'slug' => Str::slug($data['brand_name']),
                    'brand_logo' => $logo_path,
                    'brand_slider' => $brand_slider_path,
                    'is_banner' => $data['banner'] ?? false
                ]);
                return redirect()->back()->with('success', 'Brand created successfully.');

            } else {
                return redirect()->back()->with('error', 'Brand logo not found.');
            }


        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }








    public function deleteBrand(Request $request, $id)
    {
        $brand = Brand::withCount('products')->findOrFail($id);
        try {
            if ($brand->products_count > 0) {
                return redirect()->back()->with('error', "You can't delete this brand when brand has products");
            }

            if ($brand->brand_logo && Storage::disk('public')->exists($brand->brand_logo)) {
                Storage::disk('public')->delete($brand->brand_logo);
            }

            if ($brand->brand_slider && Storage::disk('public')->exists($brand->brand_slider)) {
                Storage::disk('public')->delete($brand->brand_slider);
            }


            $brand->delete();
            return redirect()->back()->with('success', 'Brand deleted successfully.');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }




    public function updateBrandPage(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        return Inertia::render('Admin/Brand/UpdateBrand', [
            'brandd' => $brand
        ]);
    }


    public function updateBrand(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $data = $request->validate([
            'brand_name' => 'required|String|max:255',
            'status' => 'required|boolean',
            'brand_logo' => 'nullable|image|mimes:png,jpg,jpeg',
            'banner' => 'nullable|boolean',
            'brand_slider' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);
        try {
            $brand_logo_path = $brand->brand_logo;
            $brand_slider_path = $brand->brand_slider;

            if ($request->hasFile('brand_logo')) {
                $brand_logo = $request->file('brand_logo');

                if ($brand->brand_logo && Storage::disk('public')->exists($brand->brand_logo)) {
                    Storage::disk('public')->delete($brand->brand_logo);
                }
                $brand_logo_name = time() . '-' . uniqid() . '.' . $brand_logo->getClientOriginalExtension();
                $brand_logo_path = $brand_logo->storeAs('brand_logo', $brand_logo_name, 'public');
            }

            if ($request->hasFile('brand_slider')) {
                $brand_slider = $request->file('brand_slider');

                if ($brand->brand_slider && Storage::disk('public')->exists($brand->brand_slider)) {
                    Storage::disk('public')->delete($brand->brand_slider);
                }
                $brand_slider_name = time() . '-' . uniqid() . '.' . $brand_slider->getClientOriginalExtension();
                $brand_slider_path = $brand_slider->storeAs('brand_slider', $brand_slider_name, 'public');
            }


            $brand->update([
                'brand_name' => $data['brand_name'],
                'published' => $data['status'],
                'brand_logo' => $brand_logo_path,
                'is_banner' => $data['banner'] ?? false,
                'brand_slider' => $brand_slider_path
            ]);

            return to_route('page.brandView')->with('success', 'Brand updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }






}
