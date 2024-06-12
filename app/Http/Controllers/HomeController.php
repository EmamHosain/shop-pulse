<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeOne(){
        return Inertia::render('Homepage/Home-1');
    }
}
