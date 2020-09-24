@extends('admin.layout')

@section('bar')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Admin panel</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{Route('admin.index')}}">Home</a></li>
                        <li><span>Orders</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">
                    <img class="avatar user-thumb" src="{{asset('admin/images/author/avatar.png')}}" alt="avatar">
                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{Auth('admin')->user()->name}}<i class="fa fa-angle-down"></i></h4>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{Route('products.index')}}">Back to website</a>
                        <a class="dropdown-item" href="{{Route('logout')}}">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="card-body">

        <div class="single-table">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead class="text-uppercase bg-light">
                    <tr>
                        <th scope="col">Order_ID</th>
                        <th scope="col">User_ID</th>
                        <th scope="col">User_Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Product</th>
                        <th scope="col">status</th>
                        <th scope="col">subtotal</th>
                        <th scope="col">ShippingMethod</th>
                        <th scope="col">ShippingPrice</th>
                        <th scope="col">total</th>
                        <th scope="col">complete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($orders) == 0 )
                        <tr>
                            <th colspan="12">
                                <div class="success alert-success text-center">
                                    <h5>
                                        No Orders until now

                                    </h5>

                                </div>
                            </th>

                        </tr>

                    @else

                    @foreach($orders as $order)

                        <tr >

                            <th scope="row"><a href="{{Route('get.single.order',['order'=>$order->order_id])}}">  {{$order->order_id}} </a></th>
                            <td>

                                <a href="{{route('get.user.single',['user'=>\App\Models\Order::where('id',($order->order_id))->first()->user_id])}}">
                                    {{\App\Models\Order::where('id',($order->order_id))->first()->user_id}}
                                </a>
                            </td>
                            <td>{{\App\Models\User::where('id',\App\Models\Order::where('id',$order->order_id)->first()->user_id)->first()->name}}</td>
                            <td>
                                {{\App\Models\ProductVariation::where('id',$order->product_variation_id)->first()->price->formatted()}}
                            </td>
                            <td>{{$order->quantity}}</td>

                            <td>
                                {{\App\Models\ProductVariation::where('id',$order->product_variation_id)->first()->product->name}}
                                {{\App\Models\ProductVariation::where('id',$order->product_variation_id)->first()->name}}
                            </td>
                            <td>
                                {{\App\Models\Order::where('id',$order->order_id)->first()->status}}
                            </td>
                            <td>
                                {{(new \App\Cart\Money((\App\Models\ProductVariation::where('id',$order->product_variation_id)->first()->price->amount())*
                                      ($order->quantity)))->formatted()}}

                            </td>
                            <td>
                                {{\App\Models\Order::where('id',$order->order_id)->first()->shippingMethod->name}}
                            </td>
                            <td>
                                {{\App\Models\Order::where('id',$order->order_id)->first()->shippingMethod->price->formatted()}}
                            </td>
                            <td>
                                {{((\App\Models\Order::where('id',$order->order_id)->first()->shippingMethod->price
                                  ->add((new \App\Cart\Money((\App\Models\ProductVariation::where('id',$order->product_variation_id)->first()->price->amount())*
                                      ($order->quantity))))))->formatted()}}
{{--                                {{(new \App\Cart\Money(\App\Models\Order::where('id',$order->order_id)->first()->total))->formatted()}}--}}
                            </td>

    <td>
        @if(\App\Models\Order::where('id',$order->order_id)->first()->status=='processing')
            <form method="post" action=" {{Route('mark.complete',['order_id'=>$order->order_id])}}">
                <button type="submit" id="but" >
                    <i class="fa fa-thumbs-up fa-2x"></i>
                    <input type="hidden" name="order_id" value="{{$order->order_id}}">
                </button>

            </form>
        @endif


    </td>



                        </tr>
                    @endforeach

                    @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


@section('footer')
<style>
    #but{
        color: blue;
        border: none;
        background: none;
    }
</style>
@endsection
