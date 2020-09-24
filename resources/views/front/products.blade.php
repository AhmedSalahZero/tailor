
@extends('front.layout')
@section('header')
    <link rel="stylesheet" type="text/css" href="{{asset('styles/bootstrap-4.1.3/bootstrap.css')}}">
    <link href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/categories.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/categories_responsive.css')}}">
@endsection

@section('footer')

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('styles/bootstrap-4.1.3/popper.js')}}"></script>
    <script src="{{asset('styles/bootstrap-4.1.3/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/greensock/TweenMax.min.js')}}"></script>
    <script src="{{asset('plugins/greensock/TimelineMax.min.js')}}"></script>
    <script src="{{asset('plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
    <script src="{{asset('plugins/greensock/animation.gsap.min.js')}}"></script>
    <script src="{{asset('plugins/greensock/ScrollToPlugin.min.js')}}"></script>
    <script src="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
    <script src="{{asset('plugins/easing/easing.js')}}"></script>
    <script src="{{asset('plugins/parallax-js-master/parallax.min.js')}}"></script>
    <script src="{{asset('plugins/Isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('plugins/Isotope/fitcolumns.js')}}"></script>
    <script src="{{asset('js/categories.js')}}"></script>

@endsection

@section('content')
    <div class="section_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="products_container grid">

                        <!-- Product -->
                        @foreach($products as $product)


                            @if($product->categories->first()->name == 'all')
                                <div class="product grid-item sale">
                                    @elseif($product->categories->first()->name =='men')
                                        <div class="product grid-item hot">
                                            @else
                                                <div class="product grid-item new">

                                                    @endif



                                                    <div class="product_inner">
                                                        <div class="product_image">
                                                            <img src="{{asset($product->image)}}" alt="" width="323px" height="439.31px">
                                                            <div class="product_tag">{{$product->categories->first()->name}}</div>
                                                        </div>
                                                        <div class="product_content text-center">
                                                            <div class="product_title"><a href="{{Route('products.show',$product->id)}}">{{$product->name}}</a></div>
                                                            <div class="product_price">{{$product->FormattedPrice}}</div>
                                                            @if($product->inStock())
                                                                <div class="product_title" > <span style="color:#808489"> Available </span> </div>
                                                                <div class="product_button ml-auto mr-auto trans_200"><a href="{{route('products.show',$product->id)}}">Buy Now</a></div>

                                                            @else
                                                                <div class="product_title" > <span style="color:#c7254e"> Out of Stock </span> </div>
                                                                <div class="product_button ml-auto mr-auto trans_200"><a href="{{route('request.create')}}">Ask for</a></div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach

                                            <!-- Product -->


                                        </div>

                                </div>
                    </div>
                </div>
            </div>





@endsection
