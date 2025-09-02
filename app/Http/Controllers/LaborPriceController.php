<?php

namespace App\Http\Controllers;

use App\Models\LaborPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class LaborPriceController extends Controller
{
    public function index()
    {
        $data['labor_prices'] = LaborPrice::orderBy('module_type')->get();
        return view('labor_prices/list', $data);
    }

    public function create()
    {
        return view('labor_prices/create');
    }

    public function add(Request $req)
    {
        $req->validate([
            'module_type' => 'required|in:staging,grading,packing',
            'price_per_kwintal' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255'
        ]);

        // Deactivate existing price for this module type
        LaborPrice::where('module_type', $req->module_type)
                  ->update(['is_active' => false]);

        // Create new price
        LaborPrice::create([
            'module_type' => $req->module_type,
            'price_per_kwintal' => $req->price_per_kwintal,
            'description' => $req->description,
            'is_active' => true
        ]);

        return Redirect::to('labor-prices')->with('success', 'Labor Price Created Successfully');
    }

    public function edit($id)
    {
        $data['labor_price'] = LaborPrice::findOrFail($id);
        return view('labor_prices/edit', $data);
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'module_type' => 'required|in:staging,grading,packing',
            'price_per_kwintal' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255'
        ]);

        $laborPrice = LaborPrice::findOrFail($id);
        
        // Deactivate existing price for this module type
        LaborPrice::where('module_type', $req->module_type)
                  ->where('id', '!=', $id)
                  ->update(['is_active' => false]);

        $laborPrice->update([
            'module_type' => $req->module_type,
            'price_per_kwintal' => $req->price_per_kwintal,
            'description' => $req->description,
            'is_active' => true
        ]);

        return Redirect::to('labor-prices')->with('success', 'Labor Price Updated Successfully');
    }

    public function delete($id)
    {
        $laborPrice = LaborPrice::findOrFail($id);
        $laborPrice->delete();
        return Redirect::to('labor-prices')->with('success', 'Labor Price Deleted Successfully');
    }

    /**
     * Get price for a specific module type (AJAX endpoint)
     */
    public function getPrice($moduleType)
    {
        $price = LaborPrice::getPriceForModule($moduleType);
        return response()->json(['price' => $price ? $price->price_per_kwintal : 0]);
    }
}
