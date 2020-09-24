<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index' , 'filter']);

    }
    public function index(){
        $categories= Category::get();

        return view('categories.index')->with('categories',$categories);
     //   dd(CategoryResource::collection(Category::get()));

    }
    public function store(CategoryStoreRequest $request){

        Category::create($request->all());
        session()->flash('success','categories has been inserted ');
//        return view('welcome');


    }
    public function filter($category_id)
    {
        $result = DB::table('category_product')->whereIn('category_id', [$category_id])->get();

        $productWithSameCategory = [];
        foreach ($result as $pro)
        {

            $i = 0;
            $productWithSameCategory[] = Product::where('id',$pro->product_id)->first() ;
            $i++ ;
        }
        if(count($productWithSameCategory) == 0)
        {
            session()->flash('fail' , 'This Category does not available now ');
            return redirect()->back();
        }
        return view('front.products')->with('products',$productWithSameCategory);

    }

}
