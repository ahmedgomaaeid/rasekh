<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('admin.shop.index', compact('shops'));
    }
    public function create()
    {
        return view('admin.shop.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'address_link' => 'required',
        ]);
        $shop = new Shop();
        $shop->name = $request->name;
        $shop->address = $request->address;
        $shop->phone = $request->phone;
        $shop->address_link = $request->address_link;
        $shop->save();
        return redirect()->route('get.admin.shops')->with('success', 'تمت الاضافة بنجاح');
    }
    public function edit($id)
    {
        $shop = Shop::find($id);
        return view('admin.shop.edit', compact('shop'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'address_link' => 'required',
        ]);
        $shop = Shop::find($id);
        $shop->name = $request->name;
        $shop->address = $request->address;
        $shop->phone = $request->phone;
        $shop->address_link = $request->address_link;
        $shop->save();
        return redirect()->route('get.admin.shops')->with('success', 'تم التعديل بنجاح');
    }
    public function destroy($id)
    {
        $shop = Shop::find($id);
        $shop->delete();
        return redirect()->route('get.admin.shops')->with('success', 'تم الحذف بنجاح');
    }
}
