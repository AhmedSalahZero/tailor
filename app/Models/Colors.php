<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    protected $fillable = ['name'];
    public function products()
    {
        return $this->belongsToMany(Product::class , 'color_product' , 'color_id','product_id');

    }
}
