<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\ProductUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function getSettingPage()
    {

        $productUnits = ProductUnit::get();
        return Inertia::render('Admin/setttings/Settings', [
            'productUnits' => $productUnits
        ]);
    }
}
