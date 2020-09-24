<?php
namespace App\cart\Payments\Gateways;
use App\cart\Payments\Gateway;
use App\Models\User;
use mysql_xdevapi\XSession;
use Stripe\Customer;

class StripeGateway implements Gateway
{
    protected  $user ;
    public function withUser(User $user){

        $this->user = $user ;
        return $this ;

    }
    public function user()
    {

        return $this->user ;
    }
    public function createCustomer(){


        if($this->user->gateway_customer_id)
        {

           return $this->getCustomer();
        }

        $customer =  new StripeGatewayCustomer(
            $this , $this->createStripeCustomer()
        );

        $this->user->update([
            'gateway_customer_id'=>$customer->id()
        ]);

        return $customer ;
    }
    public function getCustomer()
    {
        if(!$this->user->gateway_customer_id)
        {
            $customer =  new StripeGatewayCustomer(
                $this , $this->createStripeCustomer()
            );

            $this->user->update([
                'gateway_customer_id'=>$customer->id()
            ]);
        }



        return new StripeGatewayCustomer($this,Customer::retrieve($this->user->gateway_customer_id));

    }
    protected function createStripeCustomer()
    {

      return Customer::create(['email'=>$this->user->email]);
    }

}
