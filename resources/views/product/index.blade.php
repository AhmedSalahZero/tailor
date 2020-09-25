@extends('front.layout')


@section('content')
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <div class="alert alert-success text-center" style="display:none">
        {{ Session::get('success') }}
    </div>


    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{Route('page.index')}}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{Route('products.index')}}">products </a>
                        <span id="result">{{$product->name}}</span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">

                <div class="col-lg-6">

                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <a class="pt active" href="#product-1">
                                <img src="{{asset($product->image)}}" alt="">
                            </a>
                            <a class="pt" href="#product-2">
                                <img src="{{asset($product->image)}}" alt="">
                            </a>
                            <a class="pt" href="#product-3">
                                <img src="{{asset($product->image)}}" alt="">
                            </a>
                            <a class="pt" href="#product-4">
                                <img src="{{asset($product->image)}}" alt="">
                            </a>
                        </div>

                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img style="width: 412.89px ; height:549.84px" data-hash="product-1" class="product__big__img" src="{{asset($product->image)}}" alt="">
                                <img style="width: 412.89px ; height:549.84px" data-hash="product-2" class="product__big__img" src="{{asset($product->image)}}" alt="">
                                <img style="width: 412.89px ; height:549.84px" data-hash="product-3" class="product__big__img" src="{{asset($product->image)}}" alt="">
                                <img style="width: 412.89px ; height:549.84px" data-hash="product-4" class="product__big__img" src="{{asset($product->image)}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{$product->name}} <span>Brand: {{$product->brand->brand_name}}</span></h3>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>( 138 reviews )</span>
                        </div>
                        <div id="post_price" class="product__details__price">{{$product->formattedPrice}} <span></span></div>
                        <p>{{$product->small_description}}</p>
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="pro-qty">
                                    <form action=""  method="POST">
                                        @csrf
                                        <input type="text" value="1" name="quantity">


                                </div>
                            </div >
                            @if($product->inStock())
                                <button href=""  class="cart-btn" id="submitData"><span class="icon_bag_alt"></span> Add to cart</button>
                            @endif
                        </div>

                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <input type="hidden" value="{{$product->id}}" name="product_id">
                                    <span>Availability:</span>
                                    @if($product->inStock())
                                        <div class="stock__checkbox">
                                            <label for="stockin">
                                                In Stock
                                                <input type="checkbox" id="stockin" checked disabled>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <span>Available color:</span>
                                        @foreach($product->colors as $color)
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="{{$color->name}}" name="color" class="custom-control-input" value="{{$color->name}}">
                                                <label class="custom-control-label" for="{{$color->name}}">{{$color->name}}</label>
                                            </div>
                                        @endforeach


                                </li>
                                <li>
                                    <span>Available size:</span>
                                    @else
                                        <div class="stock__checkbox">
                                            <label for="stockout">
                                                out of stock
                                                <input type="checkbox" id="stockout" disabled >
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                    @endif

                                </li>
                                <li>

                                    @if($product->inStock() )

                                    @endif


                                    @foreach($product->variations as $type)

                                        @if($type->inStock() )

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" csq="{{$type->id}}" id="{{$type->name}}" name="size" class="custom-control-input xzzz" value="{{$type->name}}">
                                                <label id="{{$type->id}}" class="custom-control-label xqqq" xq="{{$type->id}}" for="{{$type->name}}">{{$type->name}}</label>
                                            </div>
                                        @endif
                                    @endforeach


                                </li>

                            </ul>

                        </div>
                    </div>
                </div>
                </form>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Description</h6>
                                <p>{{$product->description}}</p>

                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <h6>Specification</h6>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                    Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                    voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                    consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                    quis, sem.</p>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <h6>Reviews ( 2 )</h6>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                    Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                    voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                    consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                    quis, sem.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>RELATED PRODUCTS</h5>
                    </div>
                </div>
                @foreach($related as $product)

                    <div class="product grid-item hot">
                        <div class="product_inner">
                            <div class="product_image">

                                <img src="{{asset($product->first()->image)}}" alt="" width="323px" height="439.31px">

                                <div class="product_tag">{{$product->first()->categories->first()->name}}</div>
                            </div>
                            <div class="product_content text-center">
                                <div class="product_title"><a href="{{Route('products.show',$product->first()->id)}}">{{$product->first()->name}}</a></div>
                                <div class="product_price">{{$product->first()->FormattedPrice}}</div>
                                <div class="product_button ml-auto mr-auto trans_200"><a href="#">add to cart</a></div>
                            </div>
                        </div>
                    </div>


                @endforeach
            </div>
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

    <style>
        button{cursor: pointer;}
    </style>
    <link rel="stylesheet" href="{{asset('new/css/style.css')}}" type="text/css">


@endsection
@section('footer')
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>


    <script>

        $(document).on('click', '#submitData', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('mapping')}}",
                data: {
                    '_token':"{{csrf_token()}}",
                    'color':$("input[name='color']:checked").val(),
                    'size':$("input[name='size']:checked").val() ,
                    'quantity':$("input[name='quantity']").val() ,
                    'product_id':$("input[name='product_id']").val()
                },
                success: function (data) {
                    document.getElementById('gettt').innerHTML=data.count_num
                    $(".alert-success").css("display", "block");
                    $(".alert-success").append("<div>item has been inserted successfully");
                }, error: function (reject) {
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.xqqq').on('click',function(event){
                // very important

                var productVariationId = event.target.id ;

                $.ajax({
                    type: 'post',
                    url: "{{route('getVarPrice')}}",
                    data: {
                        '_token':"{{csrf_token()}}",
                        'productVariationId':productVariationId
                    },
                    success: function (data) {
                        document.getElementById('post_price').innerHTML = data.price


                    }, error: function (reject) {
                    }
                });


            })
        });

    </script>


    <script>
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
