<?php

namespace App\Http\Controllers\Orders;

use App\cart\Cart;
use App\cart\Payments\Gateways\StripeGateway;
use App\Events\Orders\OrderCreated;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentMethods\PaymentMethodController;
use App\Http\Requests\Orders\OrderStoreRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class OrderController extends Controller
{
    protected $cart ;
    public function index(Request $request)
    {
        $order = $request->user()->orders()->with(['address','shippingMethod' , 'products','products.stock'
        ,'products.product' , 'products.product.variations','products.product.variations.stock'
        ])->latest()->paginate(10);
        return OrderResource::collection($order);
    }
    public function store(Request $request , Cart $cart)
    {


        $cart->sync();


        if($cart->CheckIfEmpty())
        {
            return response(null , 400);

        }

        $this->cart = $cart ;


         $order = $this->createOrder($request);

         $order->products()->syncWithoutDetaching($cart->products()->forSyncing());



      Event(new OrderCreated($order));

        return redirect()->route('products.index');

    }
    protected function createOrder(Request $request )
    {

        $paymentMethod = $this->createPaymentMethod($request , $request->paymentType='tok_visa');
        $shippingMethod = $request->user()->shippingMethod ;
        $address = $request->user()->addresses->first() ;

       return  $request->user()->orders()->create(
        array_merge(
            ['address_id'=>$address->id , 'shipping_method_id'=>$shippingMethod->id, 'payment_method_id'=>$paymentMethod->id] ,[
            'total'=>($this->cart->subTotal()->add($request->user()->shippingMethod->price))->amount(),
                'subtotal'=>$this->cart->subTotal()->amount()
        ]));
    }
    public function createPaymentMethod(Request $request , $paymentType)
    {

        $payment = new PaymentMethodController(new StripeGateway());
        return ($payment->store($request , $paymentType));

    }
    public function show()

    {           $orders = DB::select('select * from `product_variation_order`');

        return view('ask.myOrder')->with('orders',$orders);


    }

}
