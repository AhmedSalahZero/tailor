<?php

namespace App\Models;

use App\Models\Traits\canBeScoped;
use App\Models\Traits\HasPrice;
use Illuminate\Database\Eloquent\Model;




class Product extends Model
{
    use canBeScoped , HasPrice;
    protected $fillable = ['name' , 'slug' , 'image' , 'tag_id' , 'brand_id' , 'price','description' , 'small_description'];


    public function getRouteKeyName()
    {
        return 'slug';

    }


    public function Categories(){

        return $this->belongsToMany(Category::class,'category_product' , 'product_id' ,
        'category_id');

    }
    public function tag()
    {
        return $this->belongsTo(Tag::class , 'tag_id' , 'id');
    }

    public function stockCount()
    {
        $totalCount = 0 ;
        foreach($this->variations as $variation)
        {
            $totalCount = $totalCount+$variation->stockCount();
        }
       return $totalCount ;
    }
    public function inStock(){
        return $this->stockCount()> 0 ;

    }
    public function variations(){


        return $this->hasMany(ProductVariation::class , 'product_id' , 'id')
            ->orderBy('order','asc');

    }
    public function brand()
    {
        return $this->belongsTo(Product_brand::class , 'brand_id' , 'id');
    }
    public function colors()
    {
        return $this->belongsToMany(Colors::class , 'color_product' , 'product_id','color_id');


    }
}

