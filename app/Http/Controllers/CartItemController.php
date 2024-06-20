<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use App\Helper\CartHelper;
use Illuminate\Http\Request;

class CartItemController extends Controller
{

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->input('productId'));
        $quantity = $request->post('quantity', 1);
        // this is for unauthenticate user -- start
        $cartItems = CartHelper::getCartItemsFromCookie();
        $isProductExists = false;
        foreach ($cartItems as &$item) {
            if ($item['product_id'] === $product->id) {
                $item['quantity'] += $quantity;
                $isProductExists = true;
                break;
            }
        }



        if (!$isProductExists) {
            $cartItems[] = [
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->discount_price ? $product->discount_price : $product->price,
            ];
        }

        // set cookie from here
        CartHelper::setCartItemsToCookie($cartItems);
        // this is for unauthenticate user -- end
        return redirect()->back()->with('success', 'Product add to cart successful.');
    }




    public function update(Request $request)
    {
        $quantity = $request->input('quantity');
        $product = Product::findOrFail($request->input('productId'));
        // return [$quantity, $product_id];

        $cartItems = CartHelper::getCartItemsFromCookie();
        foreach ($cartItems as &$item) {
            if ($item['product_id'] === $product->id) {
                $item['quantity'] = $quantity;
                break;
            }
        }
        CartHelper::setCartItemsToCookie($cartItems);
        return redirect()->back()->with('success', 'Product quantity updated successful.');
    }



    public function delete(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cartItems = CartHelper::getCartItemsFromCookie();
        foreach ($cartItems as $i => &$item) {
            if ($item['product_id'] === $product->id) {
                array_splice($cartItems, $i, 1);
                break;
            }
        }
        CartHelper::setCartItemsToCookie($cartItems);
        return redirect()->back()->with('success', 'Item removed successfully');
    }


}
