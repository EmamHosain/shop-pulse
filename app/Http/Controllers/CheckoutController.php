<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // $cartItems = CartHelper::getCartItemsFromCookie();
        return Inertia::render('Guest/Checkout', [
            // 'cartItems' => $cartItems
        ]);
    }
}
