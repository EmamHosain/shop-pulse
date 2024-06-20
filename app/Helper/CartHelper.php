<?php
namespace App\Helper;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartHelper
{

    // now workable function start here
    public static function getCount()
    {
        // count of item 
        return array_reduce(self::getCartItemsFromCookie(), fn($carry) => $carry + 1, 0);
    }

    public static function getCartItems()
    {

        return self::getCartItemsFromCookie();

    }

    // set cookie
    public static function setCartItemsToCookie(array $cartItems)
    {
        Cookie::queue('cart_items', json_encode($cartItems), 60 * 24 * 30);
    }



    // get cookie
    public static function getCartItemsFromCookie()
    {
        return json_decode(request()->cookie('cart_items', '[]'), true);
    }

    // get products and cartitems
    public static function getProductsAndCartItems()
    {
        $cartItems = self::getCartItems();

        $ids = Arr::pluck($cartItems, 'product_id');
        $products = Product::whereIn('id', $ids)->with('productImages')->get();

        $cartItems = Arr::keyBy($cartItems, 'product_id');
        return [$products, $cartItems];
    }
    // now workable function end here













    // save cookie 
    public static function saveCookieWithCartItems(Request $request)
    {

        $user = auth()->user();
        $userCartItems = CartItem::where(['user_id' => $user->id])->get()->keyBy('product_id');
        $savedCartItems = [];
        foreach (self::getCartItemsFromCookie() as $cartItem) {
            if (isset($userCartItems[$cartItem['product_id']])) {
                $userCartItems[$cartItem['product_id']]->update(['quantity' => $cartItem['quantity']]);
                continue;
            }
            $savedCartItems[] = [
                'user_id' => $user->id,
                'product_id' => $cartItem['product_id'],
                'quantity' => $cartItem['quantity'],
            ];
        }
        if (!empty($savedCartItems)) {
            CartItem::insert($savedCartItems);
        }



    }


    // move cart item into database 
    public static function moveCartItemsIntoDb(Request $request)
    {

        $request = request();
        $cartItems = self::getCartItemsFromCookie();
        $newCartItems = [];
        foreach ($cartItems as $cartItem) {
            // Check if the record already exists in the database
            $existingCartItem = CartItem::where([
                'user_id' => $request->user()->id,
                'product_id' => $cartItem['product_id'],
            ])->first();

            if (!$existingCartItem) {
                // Only insert if it doesn't already exist
                $newCartItems[] = [
                    'user_id' => $request->user()->id,
                    'product_id' => $cartItem['product_id'],
                    'quantity' => $cartItem['quantity'],
                ];
            }
        }


        if (!empty($newCartItems)) {
            // Insert the new cart items into the database
            CartItem::insert($newCartItems);
        }

    }







}