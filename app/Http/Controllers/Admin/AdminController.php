<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard');
    }

    public function dashboardOverview()
    {
        return Inertia::render('Admin/DashboardOverview');
    }
    public function updateProfile(){
        return Inertia::render('Admin/Profile/UpdateProfile');
    }
}
