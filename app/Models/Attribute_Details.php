<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute_Details extends Model
{
    use HasFactory;
    protected $table='attribute_details';
    protected $fillable = [
        "data",
        "product_id",
        "attribute_id",
    ];


        public function attribute()
        {
            return $this->belongsTo(Attribute::class, 'attribute_id');
        }


        public function product()
        {
            return $this->belongsTo(Product::class);
        }
}
