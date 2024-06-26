<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategorySlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategorySliderController extends Controller
{
    public function categorySliderRemove(Request $request, $id)
    {
        $categorySlider = CategorySlider::findOrFail($id);
        // return $categorySlider;
        if (Storage::disk('public')->exists($categorySlider->cat_slider)) {
            Storage::disk('public')->delete($categorySlider->cat_slider);
            $categorySlider->delete();
            return back()->with('success', 'Category slider deleted successfully.');

        }
        return back()->with('error', 'Something went wrong!');
    }
}
