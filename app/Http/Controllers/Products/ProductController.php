<?php

namespace App\Http\Controllers\Products;

use App\cart\Cart;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\StoreRequest;
use App\Http\Resources\ProductIndexResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Tag;
use App\Scoping\Scopes\CategoryScope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminOrUser')->only(['show']);
    }

    public function index()
    {



        $product = Product::with('variations.stock')->WithScopes($this->scopes())->paginate(16);


        return view('front.products')->with('products' , ProductIndexResource::collection($product));
    }

    public function scopes(){
//        dump(2);

        return [
            'category'=>new CategoryScope()

        ];

    }


    public function store(Request $request)
    {

    }
    public function show($product)
    {


        $product = Product::find($product);
        $category_id = $product->categories->first()->pivot->category_id ;
        $result = DB::table('category_product')->whereIn('category_id', [$category_id])->get();
        foreach ($result as $pro)
        {
            $i = 0;
            $productWithSameCategory[] = Product::where('id',$pro->product_id)->get() ;
            $i++ ;
        }

        $product->load(['variations.type' , 'variations.stock','variations.product',
            'variations']);

        return view('product.index')->with('product',new ProductResource($product))->with('related',$productWithSameCategory);

    }
    public function mapping(Request $request)
    {


        $validator = Validator::make($request->all() ,$this->rules() , $this->messages() );
        if($validator->fails())
        {
             session()->flash('fail',$validator->errors()->first());
             return redirect()->back();
        }
         $data= (Request()->all());
         $quantity = ($data['quantity']);
         $product_id = ProductVariation::where('product_id',$data['product_id'])->where('name',$data['size'])->first()->id;
         $newdata = [$product_id=>[
             'quantity'=>$quantity
         ]];
         $cartController = new CartController();
         return $cartController->store($newdata , new Cart(Auth()->user()));
    }
    public function getProductVariationPrice(Request $request)
    {
        $price = ProductVariation::where('id',$request->productVariationId)->first()->price->formatted();
       return response()->json([
           'price'=>$price,
           'count_num'=>count(Request()->user()->cart)
       ]);

    }
    public function getCartNum()
    {
        $cartCount = count(Request()->user()->cart) ;
        return response()->json([
            'count_num'=>$cartCount
        ]);


    }

    public function rules()
    {
        return [
            'quantity'=>'required' ,
            'size'=>'required' ,
            'color'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'size.required'=>'Please Choose the size' ,
            'color.required'=>'please choose the color'
        ];
    }







}
