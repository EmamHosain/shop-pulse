<?php

namespace App\Http\Controllers;


use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Helper\WishListHelper;

class WishListController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Guest/Wishlist');
    }

    protected function remove_duplicate_key_value_pairs($array)
    {
        $unique_array = array();
        $serialized = array();

        foreach ($array as $key => $value) {
            $serialized_key_value = serialize([$key, $value]);
            if (!in_array($serialized_key_value, $serialized)) {
                $serialized[] = $serialized_key_value;
                $unique_array[$key] = $value;
            }
        }

        return $unique_array;
    }

    public function store(Request $request)
    {
        $product_id = $request->input('productId');
        $product = Product::findOrFail($product_id);
        $wishlistItems = WishListHelper::getCartItemsFromCookie();




        if (count($wishlistItems) > 0) {
            foreach ($wishlistItems as &$item) {
                if ($item['product_id'] === $product->id) {
                    return;
                }
            }
            array_push($wishlistItems, ['product_id' => $product->id]);
            // $wishlistItems = $this->remove_duplicate_key_value_pairs($wishlistItems);
        } else {
            $wishlistItems[] = [
                'product_id' => $product->id,
            ];
        }




        // set cookie from here
        WishListHelper::setCartItemsToCookie($wishlistItems);
        // this is for unauthenticate user -- end
        return redirect()->back()->with('success', 'Product add to wishlist successful.');
    }






    public function delete(Request $request, $id)
    {
        // Find the product by ID or throw an exception if not found
        $product = Product::findOrFail($id);

        // Retrieve the wishlist items from the cookie as an array
        $wishlistItems = WishListHelper::getCartItemsFromCookie();

        // Ensure the decoded data is an array
        if (!is_array($wishlistItems)) {
            $wishlistItems = [];
        }

        // Flag to track if an item was found and removed
        $itemRemoved = false;

        // Iterate through the wishlist items to find and remove the product
        foreach ($wishlistItems as $index => $item) {
            if (isset($item['product_id']) && $item['product_id'] == $product->id) {
                // Remove the item at the current index
                // return [$index => $item];
                array_splice($wishlistItems, $index, 1);
                $itemRemoved = true;
                break; // Exit the loop after removing the item
            }
        }

        // Save the updated wishlist items back to the cookie
        WishListHelper::setCartItemsToCookie($wishlistItems);

        // Redirect back with a success message if an item was removed
        if ($itemRemoved) {
            return redirect()->back()->with('success', 'wishlist Item removed successfully');
        } else {
            return redirect()->back()->with('error', 'wishlist Item not found in wishlist');
        }
    }



}
