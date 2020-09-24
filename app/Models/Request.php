<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['category_id','type','size','material','amount','expected_cost' ,'user_id', 'description' ,'color' ,'status'];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');

    }
    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id' , 'id');

    }


}
