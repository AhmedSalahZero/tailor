<?php

namespace App\Models;

use App\Models\Traits\HasChildren;
use App\Models\Traits\IsOrderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'  , 'slug'];
    public function products()
    {
       return $this->belongsToMany(Product::class , 'category_product' ,
       'category_id' , 'product_id');
    }
    public function requests()
    {
        return $this->hasMany(Request::class , 'category_id' , 'id');
    }



}
