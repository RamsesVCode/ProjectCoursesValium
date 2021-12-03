<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::all();
        return view('admin.prices.index',compact('prices'));
    }

    public function create()
    {
        return view('admin.prices.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            // 'name' => 'required',
            'mount' => 'required|numeric|min:0|max:5000',
        ]);
        Price::create([
            'name' => $request->mount,
            'mount' => $request->mount,
        ]);
        return redirect()->route('admin.prices.index')
            ->with('success','Precio creadao exitosamente');
    }
    public function show(Price $price)
    {
        //
    }

    public function edit(Price $price)
    {
        return view('admin.prices.edit',compact('price'));
    }

    public function update(Request $request, Price $price)
    {
        $request->validate([
            // 'name' => 'required|min:5|max:40',
            'mount' => 'required|numeric',
        ]);
        $price->update([
            'name' => $request->mount,
            'mount' => $request->mount
        ]);
        return redirect()->route('admin.prices.index')
            ->with('success','Precio actualizado exitosamente');
    }

    public function destroy(Price $price)
    {
        $price->delete();
        return redirect()->back()->with('success','Precio eliminado exitosamente');
    }

}
