<?php


namespace App\cart\Payments\Gateways;


use App\cart\Payments\Gateway;
use App\cart\Payments\GatewayCustomer;
use App\Models\PaymentMethod;
use Stripe\Charge;
use Stripe\Customer;
use Exception;
use App\Exceptions\PaymentFailedException;

class StripeGatewayCustomer implements GatewayCustomer
{
    protected $gateway ;
    protected  $customer ;
    public function __construct(Gateway $gateway , Customer $customer)
    {
        $this->gateway = $gateway ;
        $this->customer = $customer ;
    }
    public function charge(PaymentMethod $card , $amount)
    {
        try {
            Charge::create([
                'customer'=>$this->customer->id,
                'amount'=>$amount,
                'currency'=>'USD',
                'source'=>$card->provider_id
            ]);



        }
        catch(Exception $e)
        {
            throw new PaymentFailedException();

        }
    }
    public function addCard($token)
    {
        // first create (e.g) visa
        $card =  $this->customer->sources->create(['source'=>$token]);
        //set the default card (inside our stripe website);
        $this->customer->default_source=$card->id ;
        $this->customer->save(); //must to save it
        return $this->gateway->user()->paymentMethods()->create([
            'provider_id'=>$card->id ,
            'card_type'=>$card->brand ,
            'last_four'=>$card->last4 ,
            'default'=>true
        ]) ;


    }
    public function id()
    {
        return $this->customer->id ;
    }

}
