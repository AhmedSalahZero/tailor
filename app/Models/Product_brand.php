<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_brand extends Model
{
    protected $fillable = ['brand_name'];
    public function products()
    {
        return $this->hasMany(Product::class , 'brand_id' , 'id');
    }
}
