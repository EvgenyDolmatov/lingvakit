<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promocode;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    public function index()
    {
        return view('cms.promocodes.index', [
            'promocodes' => Promocode::all()
        ]);
    }

    public function create()
    {
        return view('cms.promocodes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:promocodes|string|max:255',
            'discount' => 'required|numeric',
            'expiration_date' => 'required',
        ]);

        $discount = $request->input('discount');
        $type = $request->input('type');

        $promocode = Promocode::create($request->all());
        $promocode->setDiscount($discount, $type);

        return redirect()->route('promocodes.index');
    }

    public function edit(Promocode $promocode)
    {
        return view('cms.promocodes.edit', [
            'promocode' => $promocode
        ]);
    }

    public function update(Request $request, Promocode $promocode)
    {
        $request->validate([
            'code' => 'required|unique:promocodes|string|max:255',
            'discount' => 'required|numeric',
            'expiration_date' => 'required',
        ]);

        $discount = $request->input('discount');
        $type = $request->input('type');

        $promocode->update($request->all());
        $promocode->setDiscount($discount, $type);

        return redirect()->route('promocodes.index');
    }

    public function destroy(Promocode $promocode)
    {
        $promocode->delete();
        return back();
    }
}
