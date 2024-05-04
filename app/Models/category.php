<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = [
        'name',
        'slug',
        'discription',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_discription',
        'status'
    ];

    function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }

    function relatedProducts()
    {
        return $this->hasMany(Product::class,'category_id','id')->latest()->take(16);
    }

    function brands()
    {
        return $this->hasMany(Brand::class,'category_id','id')->where('status','0');
    }
}
