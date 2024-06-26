<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ProductImageController extends Controller
{
    public function removeProductImage(Request $request, $productId, $imageId)
    {
        // Find the product and its associated images
        $product = Product::with('productImages')->findOrFail($productId);

        // Find the specific image to delete
        $productImage = $product->productImages->firstWhere('id', $imageId);

        if (!$productImage) {
            // If the image is not found, redirect back with an error message
            return back()->with('error', 'Image not found.');
        }

        // Construct the path to the image
        $imagePath = "{$productImage->image}";

        // Check if the image file exists and delete it
        if (Storage::disk('public')->exists($imagePath)) {
            // Delete the image file from the storage
            Storage::disk('public')->delete($imagePath);
        } else {
            // Log a warning if the image file does not exist
            Log::warning("Image file does not exist: $imagePath");
        }

        // Delete the image record from the database
        $productImage->delete();

        // Return back with a success message
        return back()->with('success', 'Image deleted successfully.');
    }

}
