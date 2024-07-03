<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\BrandResource;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Resources\CategoryResource;


class HomeController extends Controller
{
    public function index()
    {

        $products = Product::where('published', true)->orderByDesc('id')->get();
        $newProducts = Product::where('published', true)->orderByDesc('id')->take(20)->get();
        return Inertia::render('Guest/Home', [
            'products' => $products,
            'newArrivalProducts' => $newProducts
        ]);
    }



}
