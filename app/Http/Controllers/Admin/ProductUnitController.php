<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductUnit;
use Illuminate\Http\Request;

class ProductUnitController extends Controller
{
    public function storeProductUnit(Request $request)
    {
        $request->validate([
            'unit' => 'required|string|unique:product_units,unit_name,except,id'
        ]);

        ProductUnit::create([
            'unit_name' => $request->input('unit'),
            'unit_value' => 0
        ]);
        return back()->with('success', 'Product unit created successfully.');
    }

    public function updateProductUnit(Request $request, $id)
    {
        $request->validate([
            'product_unit' => 'required|string'
        ]);

        $productUnit = ProductUnit::findOrFail($id);
        $productUnit->update([
            'unit_name' => $request->input('product_unit')
        ]);

        return back()->with('success', 'Product unit updated successfully.');
    }


    public function deleteProductUnit(Request $request, $id)
    {
        $productUnit = ProductUnit::findOrFail($id);
        $productUnit->delete();
        return back()->with('success','Product unit deleted successfully.');
    }



}
