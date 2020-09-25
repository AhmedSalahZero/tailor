@extends('front.layout')


@section('content')

    @include('partial.session')
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{Route('page.index')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->



    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            @if(  $user->cart->count() > 0)
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>

                                <th>Total</th>

                                <th>remove</th>
                            </tr>
                            </thead>
                            <tbody>


@foreach($user->cart  as $pro)
    <tr class="itemNo{{$pro->id}}">
                                <td class="cart__product__item ">
                                    <img src="{{asset($pro->product->image)}}" alt="" width="140px" height="140px">
                                    <div class="cart__product__item__title">
                                        <h6>{{$pro->product->name}} {{$pro->name}}</h6>

                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>

                                </td>


                                <td class="cart__price">{{$pro->price->formatted()}}</td>

                                <td class="cart__quantity">

                                    <div class="pro-qty">
                                        <form action="">
                                            <input type="text" class="btn_val" value="{{$pro->pivot->quantity}}" name="quantity">

                                    </div>

                                </td>

                                    <td class="zzzzzz">{{$subtotal[$pro->name]}}</td>



                                    <td class="xui">

                                        <button  type="button" pro_id="{{$pro->id}}"  class=" btn btn-rounded btn-danger delete_cart">remove</button>
                                    </td>
                            </tr>
@endforeach
                              @endif


                            @if($user->cart->count() == 0)
                                <div class="alert alert-success text-center ">
                                   you have no items in your cart yet !
                                </div>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="{{Route('products.index')}}">Continue Shopping</a>
                    </div>
                </div>

                @if(  $user->cart->count() > 0)
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn" id="empty_cart_id">
                        <a href="{{Route('cart.deleteAll')}}"><span class="icon_loading"></span> Empty cart</a>
                    </div>
                </div>
                    @endif
            </div>


            </form>
            @if($user->cart->count() > 0)
            <div class="row">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-4 offset-lg-2" id="cart_details_price">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span id="sub_total"> {{$total}}</span></li>
                            <li>shippingMethod <span> {{Auth()->user()->shippingMethod->name}}</span></li>
                            <li>ShippingPrice <span > {{Auth()->user()->shippingMethod->price->formatted()}}</span></li>
                            <li>Total <span id="sub_totalWithShipping">{{$totalWithShipping}}</span></li>
                        </ul>
                        <a href="{{Route('check.out')}}" class="primary-btn">Proceed to checkout</a>


                    </div>
                </div>
            </div>
                @endif
        </div>
    </section>
@endsection
@section('head')

    <link rel="stylesheet" href="{{asset('new/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('new/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('new/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('new/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('new/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('new/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('new/css/slicknav.min.css')}}" type="text/css">



@endsection

@section('style')


    <link rel="stylesheet" href="{{asset('new/css/style.css')}}" type="text/css">

@endsection
@section('footer')


    <script>

        $(document).on('click', '.delete_cart', function (e) {
            e.preventDefault();
            //   var product_id= $('#delete_cart').attr('getId')
            var product_id = $(this).attr('pro_id')


            $.ajax({
                type: 'delete',
                dataType   : 'json',
                content:'json',
                url: 'cart/'+product_id,
                data: {
                    '_token':"{{csrf_token()}}" ,
                    'product_id':product_id ,

                },
                success: function (data) {
                    $('.itemNo'+data.id).remove();
                    document.getElementById('sub_totalWithShipping').innerHTML =data.totalWithShipping ;
                    document.getElementById('sub_total').innerHTML = data.Total ;
                    document.getElementById('gettt').innerHTML=data.count_num
                        $(".alert-success").css("display", "block");
                    if(data.Total == "$0.00")
                    {
                        $('#cart_details_price').remove();
                        $('#empty_cart_id').remove();





                    }
                    $(".alert-success").append("<P>item has been Deleted successfully");
                }, error: function (data) {
                    console.log('response', data);
                    $(".alert-success").css("display", "block");
                    $(".alert-success").append("<P> Error happened while Deleted the quantity ");

                }
            });
        });

    </script>



  <script>

        $(document).on('click', '.update_cart', function (e) {
            e.preventDefault();
            var product_id = $(this).attr('pro_id')
            alert(product_id)



            $.ajax({
                type: 'PUT',
                url: '/cart/'+product_id ,
                data: {
                    '_token':"{{csrf_token()}}",
                    'quantity':$("input[name='quantity']").val() ,
                },
                success: function (data) {
                    console.log('response', data);
                    $(".alert-success").css("display", "block");
                    $(".alert-success").append("<P>item has been Updated successfully");
                }, error: function (data) {
                    console.log('response', data);
                    $(".alert-success").css("display", "block");
                    $(".alert-success").append("<P> Error happened while updating the quantity ");

                }
            });
        });



    </script>


    <script src="{{asset('new/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('new/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('new/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('new/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('new/js/mixitup.min.js')}}"></script>
    <script src="{{asset('new/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('new/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('new/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('new/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('new/js/main.js')}}"></script>

@endsection
