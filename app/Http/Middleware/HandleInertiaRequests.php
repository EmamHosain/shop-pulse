<?php

namespace App\Http\Middleware;


use App\Models\Brand;
use Inertia\Middleware;
use App\Models\Category;
use Tighten\Ziggy\Ziggy;
use App\Helper\CartHelper;
use App\Helper\WishListHelper;

use Illuminate\Http\Request;
use App\Http\Resources\CartResource;
use App\Http\Resources\BrandResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\WishlistResource;



class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $categories = Category::select(['id','cat_name','cat_logo','slug'])->where('published', true)->get();
        $brands = Brand::get();

        return [
            ...parent::share($request),
            // 'ziggy' => fn() => [
            //     ...(new Ziggy)->toArray(),
            //     'location' => $request->url(),
            // ],

            'flash' => [
                'success' => fn() => $request->session()->get('success'),
                'error' => fn() => $request->session()->get('error'),
                'warning' => fn() => $request->session()->get('warning'),
                'info' => fn() => $request->session()->get('info')
            ],

            'categories' => CategoryResource::collection($categories),
            'brands' => BrandResource::collection($brands),
            'cart' => new CartResource(CartHelper::getProductsAndCartItems()),

            'wishlist' => new WishlistResource(WishListHelper::getProductsAndCartItems()),


        ];
    }
}
