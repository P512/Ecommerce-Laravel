<?php

namespace App\Http\Controllers\Admin;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(){
        return view("admin.category.index");
    }

    public function create(){
        return view("admin.category.create");
    }

    public function store(CategoryRequest $request){
        $validatedData = $request->validated();
        $category = new category;
        $category->name = $validatedData["name"];
        $category->slug = Str::slug($validatedData["slug"]);
        $category->description = $validatedData["description"];

        // $uploadpath = 'uploads/category/';
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $ext = $file->getClientOriginalExtension();
            $filename = time() .".". $ext;
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }


        $category->meta_title = $validatedData["meta_title"];
        $category->meta_keyword = $validatedData["meta_keyword"];
        $category->meta_description = $validatedData["meta_description"];
        $category->status = $request->status == true ?'1':'0';
        $category->save();

        return redirect("admin/category")->with("message","Category Add Successfull");

    }

    public function edit(category $category)
    {
        return view("admin.category.edit", compact("category"));
    }

    public function update(CategoryRequest $request,category $category)
    {
        $category = Category::findOrFail($category);

        $validatedData = $request->validated();
        $category->name = $validatedData["name"];
        $category->slug = Str::slug($validatedData["slug"]);
        $category->description = $validatedData["description"];


        if ($request->hasFile("image"))
        {
            $uploadpath = 'uploads/category/';
            $path = 'uploads/category'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }

            $file = $request->file("image");
            $ext = $file->getClientOriginalExtension();
            $filename = time() .".". $ext;
            $file->move('uploads/category', $filename);
            // $image->move(public_path("uploads/category/"), $filename);
            $category->image = $filename;
            $category->image = $uploadpath.$filename;
        }


        $category->meta_title = $validatedData["meta_title"];
        $category->meta_keyword = $validatedData["meta_keyword"];
        $category->meta_description = $validatedData["meta_description"];
        $category->status = $request->status == true ?'1':'0';
        $category->update();
        return redirect("admin/category")->with("message","Category Update Successfull");
    }

}

