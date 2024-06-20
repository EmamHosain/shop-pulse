<?php
namespace App\Helper;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cookie;



class WishListHelper
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
    public static function setCartItemsToCookie(array $wishlistItems)
    {
        Cookie::queue('wishlist_items', json_encode($wishlistItems), 60 * 24 * 30);
    }



    // get cookie
    public static function getCartItemsFromCookie()
    {
        return json_decode(request()->cookie('wishlist_items', '[]'), true);
    }

    // get products and cartitems
    public static function getProductsAndCartItems()
    {
        $wishlistItems = self::getCartItems();

        $ids = Arr::pluck($wishlistItems, 'product_id');
        $products = Product::whereIn('id', $ids)->with('productImages')->get();

        $wishlistItems = Arr::keyBy($wishlistItems, 'product_id');
        return [$products, $wishlistItems];
    }
    // now workable function end here

}