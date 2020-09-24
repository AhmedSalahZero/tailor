@extends('front.layout')

@section('header')

    <link rel="stylesheet" href="{{asset('newly/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('newly/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('newly/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('newly/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('newly/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('newly/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('newly/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('newly/css/style.css')}}" type="text/css">
@endsection

@section('content')

    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{route('products.index')}}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{route('cart.index')}}"><i class="fa fa-shopping-cart"></i> cart </a>
                        <span>Payment process</span>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <section class="checkout spad">
        <div class="container">
            <form action="{{Route('orders.store')}}" class="checkout__form" method="post">
                <div class="row">

                    <div class="col-lg-8">
                        <div class="checkout__order">
                            <h5>Your order</h5>
                            <div class="checkout__order__product">
                                <ul>
                                    <li>
                                        <span class="top__text">Product</span>
                                        <span class="top__text__right">Total</span>
                                    </li>
                                   @foreach($user->cart  as $pro )
                                        <li>{{$pro->product->name}} {{$pro->name}} <span>{{$subtotal[$pro->name]}}</span></li>

                                        @endforeach

                                </ul>

                            </div>
                            <div class="checkout__order__total">
                                <ul>

                                    <li>Subtotal <span>{{$total}}</span></li>
                                    <li>ShippingMethod <span>{{Auth()->user()->shippingMethod->name}}</span></li>
                                    <li>ShippingPrice <span>{{Auth()->user()->shippingMethod->price->formatted()}}</span></li>

                                    <li>Total <span>{{$totalWithShipping}}</span></li>
                                </ul>
                            </div>
                            <div class="checkout__order__widget">
                                <label for="check-payment">
                                    Visa
                                    <input type="checkbox" id="check-payment">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="paypal">
                                    on Delivery
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">Place oder</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>


@endsection
@section('footer')
    <script src="{{asset('newly/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('newly/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('newly/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('newly/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('newly/js/mixitup.min.js')}}"></script>
    <script src="{{asset('newly/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('newly/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('newly/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('newly/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('newly/js/main.js')}}"></script>

@endsection
