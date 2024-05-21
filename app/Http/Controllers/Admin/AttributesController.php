<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\Attribute_Details;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    function index()
    {
        $attributes = Attribute::with('product')->get();
        $products = Product::all();
        return view("admin.attributes.index",compact('attributes','products'));
    }
    function indexdata()
    {
        $attribute_details = Attribute_Details::all();
        return view("admin.attributes.index_details",compact('attribute_details'));
    }
    function create()
    {
        $products = Product::all();
        return view("admin.attributes.create",compact('products'));
    }
    function create_details()
    {
        $products = Product::all();
        $attribute = Attribute::all();
        return view("admin.attributes.create_details",compact('products','attribute'));
    }
    function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            ]);

        $attribute = new Attribute;
        $attribute->name = $validatedData["name"];
        $attribute->save();
        return redirect('admin/attributes')->with('message','Attribute Added SuccessFull..');
    }
    function store_details(Request $request)
    {
        $validatedData = $request->validate([
            'data' => ['required', 'string'],
            'data_slug' => ['required', 'string'],
            'attribute_id' => ['required','integer'],
            ]);

        $attribute = new Attribute_Details;
        $attribute->data = $validatedData["data"];
        $attribute->data_slug = $validatedData["data_slug"];
        $attribute->attribute_id = $validatedData["attribute_id"];
        $attribute->save();
        return redirect('admin/attributes/details')->with('message','Attribute_Details Added SuccessFull..');
    }

    public function edit(Attribute $attribute)
    {
        $products = Product::all();
        return view('admin.attributes.edit',compact("attribute","products"));
    }
    public function edit_details(Attribute_Details $details)
    {
        $products = Product::all();
        return view('admin.attributes.edit_details',compact("details","products"));
    }

    public function update(Request $request, $attribute)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],

        ]);
        Attribute::findOrFail($attribute)->update([
            'name' => $request->name,
        ]);

        return redirect('/admin/attributes')->with('message','Attribute Updated SuccessFull..');
    }
    public function update_details(Request $request, $attribute_details)
    {
        $validated = $request->validate([
            'data' => ['required', 'string'],
        ]);
        Attribute_details::findOrFail($attribute_details)->update([
            'data' => $request->data,
        ]);

        return redirect('/admin/attributes/details')->with('message','Attribute Details Updated SuccessFull..');
    }
    public function destroy($attribute)
    {
        $attribute = Attribute::findOrFail($attribute);
        $attribute->delete();
        return redirect('admin/attributes')->with('message','Attribute Delete SuccessFull..');
    }
    public function destroy_details($attribute)
    {
        $attribute = Attribute_Details::findOrFail($attribute);
        $attribute->delete();
        return redirect('admin/attributes/details')->with('message','Attribute_Details Delete SuccessFull..');
    }
}
