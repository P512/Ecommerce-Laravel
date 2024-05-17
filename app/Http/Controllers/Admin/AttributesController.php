<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    function index()
    {
        $attributes = Attribute::with('product')->get();
        $products = Product::all();
        return view("admin.attributes.index",compact('attributes','products'));
    }
    function create()
    {
        $products = Product::all();
        return view("admin.attributes.create",compact('products'));
    }
    function store(Request $request)
    {
        $validatedData = $request->validate([
            'ram' => ['required', 'string'],
            'storage' => ['required', 'string'],
            'original_price'=>['required','integer'],
            'selling_price'=>['required','integer'],
            'product_id' => ['required','integer']
            ]);

        $attribute = new Attribute;
        $attribute->ram = $validatedData["ram"];
        $attribute->storage = $validatedData["storage"];
        $attribute->original_price = $validatedData["original_price"];
        $attribute->selling_price = $validatedData["selling_price"];
        $attribute->product_id = $validatedData["product_id"];
        $attribute->save();
        return redirect('admin/attributes')->with('message','Attribute Added SuccessFull..');
    }

    public function edit(Attribute $attribute)
    {
        $products = Product::all();
        return view('admin.attributes.edit',compact("attribute","products"));
    }

    public function update(Request $request, $attribute)
    {
        $validated = $request->validate([
            'ram' => ['required', 'string'],
            'storage' => ['required', 'string'],
            'original_price'=>['required','integer'],
            'selling_price'=>['required','integer'],
            'product_id' => ['required','integer'],

        ]);
        Attribute::findOrFail($attribute)->update([
            'ram' => $request->ram,
            'storage' => $request->storage,
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'product_id' => $request->product_id,
        ]);

        return redirect('/admin/attributes')->with('message','Attribute Updated SuccessFull..');
    }
    public function destroy($attribute)
    {
        $attribute = Attribute::findOrFail($attribute);
        $attribute->delete();
        return redirect('admin/attributes')->with('message','Attribute Delete SuccessFull..');
    }
}
