<?php

namespace App\Http\Controllers\Cart;

use App\cart\Cart;
use App\cart\Money;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartStoreRequest;
use App\Http\Requests\Cart\CartUpdateRequest;
use App\Http\Requests\Cart\StoreRequest;
use App\Http\Resources\Cart\CartResource;
use App\Models\ProductVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{


    public function index(Request $request , Cart $cart)
    {
        $cart->sync();
        $total = 0 ;

        $request->user()->load([
            'cart.product' ,'cart.product.variations.stock' , 'cart.stock'
        ]);
$sub = [] ;
    foreach ($request->user()->cart as $pro)
    {
        $sub[$pro->name]=(new Money($pro->pivot->quantity * $pro->price->Amount()))->formatted();

        $total += $pro->pivot->quantity * $pro->price->Amount() ;
    }
    $totalWithShipping = (new Money($total +$request->user()->shippingMethod->price->amount()))->formatted()  ;

      $total = (new Money($total))->formatted();

        $shippingMethodPrice= $request->user()->shippingMethod->price ;
        $meta = $this->meta($cart , $request ,$shippingMethodPrice);

        if($meta['changed'])
        {
            session()->flash('fails','sorry , the quantity has been changed , please check quantity again');
            return redirect()->back();
        }
        $user = (new CartResource($request->user())) ;
        return view('cart.index')->with('user' , $user)->with('meta',$meta)
            ->with('total',$total)->with('subtotal',$sub)->with('totalWithShipping',$totalWithShipping);
    }
    protected function meta(Cart $cart , Request $request ,$shippingMethodPrice){

        return [
            'empty'=>$cart->CheckIfEmpty() ,
            'subTotal'=>$cart->subTotal()->formatted(),

            'changed'=>$cart->hasChanged()
        ];
    }
    public function store(   $request , Cart $cart)
    {


        $cart->sync();
        $cart->add($request);
        return response()->json([
            'count_num'=>count(Request()->user()->cart)
        ]);

    }

    public function update( $ProductVariation , Request $request , Cart $cart)
    {



        $cart->update($ProductVariation->id , $request->quantity);
    }
    public function destroy($ProductVariation)
    {

        $cart = new Cart(Auth()->user());

        $cart->delete($ProductVariation);
        $total = 0 ;
        foreach (Request()->user()->cart as $pro)
        {

            $total += $pro->pivot->quantity * $pro->price->Amount() ;
        }
        $totalWithShipping = (new Money($total +Request()->user()->shippingMethod->price->amount()))->formatted()  ;

        $total = (new Money($total))->formatted();
        $count_num = count(Request()->user()->cart);



        return response()->json([
            'status'=>true ,
            'id'=>$ProductVariation ,
            'Total'=>$total ,
            'totalWithShipping'=>$totalWithShipping,
            'count_num'=>$count_num
        ]);

    }


public function show(Cart $cart)
{
    $cart->emptyCart();
    session()->flash('success','cart has been emptied successfully');
    return redirect()->route('categories.index');
}
    public function CheckIfCartEmpty(Cart $cart)
    {
        $cart->CheckIfEmpty();
    }
    public function checkoutView(Request $request , Cart $cart)
    {
        $cart->sync();
        $total = 0 ;

        $request->user()->load([
            'cart.product' ,'cart.product.variations.stock' , 'cart.stock'
        ]);
        $sub = [] ;
        foreach ($request->user()->cart as $pro)
        {
            $sub[$pro->name]=(new Money($pro->pivot->quantity * $pro->price->Amount()))->formatted();

            $total += $pro->pivot->quantity * $pro->price->Amount() ;
        }
        $totalWithShipping = (new Money($total +$request->user()->shippingMethod->price->amount()))->formatted()  ;

        $total = (new Money($total))->formatted();

        $shippingMethodPrice= $request->user()->shippingMethod->price ;
        $meta = $this->meta($cart , $request ,$shippingMethodPrice);

        if($meta['changed'])
        {
            session()->flash('fails','sorry , the quantity has been changed , please check quantity again');
            return redirect()->back();
        }
        $user = (new CartResource($request->user())) ;

        return view('cart.checkout')->with('user' , $user)->with('meta',$meta)
            ->with('total',$total)->with('subtotal',$sub)->with('totalWithShipping',$totalWithShipping);;

    }

}
