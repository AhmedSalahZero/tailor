<?php


namespace App\cart;


use App\Models\ShippingMethod;
use App\Models\User;

class Cart
{
    protected  $user ;
    protected  $shipping ;
    protected $changed = false;
    public function __construct(User $user)
    {

        $this->user = $user ;
    }
    public function products()
    {
        return $this->user->cart ;
    }
    public function add($products){
        $product_id = array_keys($products)[0];

        $this->user->cart()->syncWithoutDetaching([$product_id=>$this->getStorePayload($product_id)]);

    }
    public function getStorePayload($product){
        $product_quantity = Request()->quantity ;

        return [
            'quantity'=>$product_quantity+$this->getCurrentQuantity($product)
        ];


    }
    public function withShipping($shippingId)
    {


        $this->shipping = ShippingMethod::find($shippingId);
        return $this ;
    }
    protected function getCurrentQuantity($productId)
    {
        if ($product = $this->user->cart()->where('id',$productId)->first())
        {

            return $product->pivot->quantity ;

        }
        return 0 ;
    }
    public function update($productId ,$quantity)
    {


        $this->user->cart()->updateExistingPivot($productId , [
            'quantity'=>$quantity
        ]);

    }
    public function delete($productId)
    {

        $this->user->cart()->detach($productId);



    }
    public function emptyCart(){
        $this->user->cart()->detach();

    }
    public function sync()
    {
        $this->user->cart()->each(function($product){
            $quantity=$product->minStock($product->pivot->quantity);
if ($quantity != $product->pivot->quantity)
{
    $this->changed=true ;
}
$product->pivot->update(['quantity'=>$quantity]) ;
        });
    }
    public function hasChanged()
    {
        return $this->changed;

    }
    public function CheckIfEmpty()
    {
        return $this->user->cart->sum('pivot.quantity') <= 0 ;
    }
    public function subTotal()
    {
        $subtotal = $this->user->cart->sum(function($product){
           return $product->price->amount() * $product->pivot->quantity ;

        });


        return new Money($subtotal);


    }
    public function total(){


        if($this->shipping)
        {
            // add the subtotal and the sipping price
            return $this->subTotal()->add($this->shipping->price);
        }

        return $this->subTotal();

    }
}
