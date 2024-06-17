<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;


class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Guest/Home', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }


    public function getProductsByCategory(Request $request)
    {
        return Inertia::render('Guest/ProductsByCategory');
    }

















    public function homeOne()
    {
        return Inertia::render('Homepage/Home-1');
    }
}
