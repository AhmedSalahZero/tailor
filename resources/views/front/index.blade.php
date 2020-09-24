@extends('front.layout')

@section('header')

    <link rel="stylesheet" type="text/css" href="{{asset('styles/bootstrap-4.1.3/bootstrap.css')}}">
    <link href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/main_styles.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('styles/responsive.css')}}">

@endsection


@section('content')


    <div class="home">

        <!-- Home Slider -->
        <div class="home_slider_container">
            <div class="owl-carousel owl-theme home_slider">

                <!-- Slide -->
                <div class="owl-item">
                    <div class="background_image" style="background-image:url({{asset('images/home_slider_1.jpg')}})"></div>
                    <div class="home_content_container">
                        <div class="home_content">
                            <div class="home_discount d-flex flex-row align-items-end justify-content-start">
                                <div class="home_discount_num">20</div>
                                <div class="home_discount_text">Discount on the</div>
                            </div>
                            <div class="home_title">New Collection</div>
                            <div class="button button_1 home_button trans_200"><a href="{{Route('categories.index')}}">Shop NOW!</a></div>
                        </div>
                    </div>
                </div>

                <!-- Slide -->
                <div class="owl-item">
                    <div class="background_image" style="background-image:url({{asset('images/home_slider_1.jpg')}})"></div>
                    <div class="home_content_container">
                        <div class="home_content">
                            <div class="home_discount d-flex flex-row align-items-end justify-content-start">
                                <div class="home_discount_num">20</div>
                                <div class="home_discount_text">Discount on the</div>
                            </div>
                            <div class="home_title">New Collection</div>
                            <div class="button button_1 home_button trans_200"><a href="{{Route('categories.index')}}">Shop NOW!</a></div>
                        </div>
                    </div>
                </div>

                <!-- Slide -->
                <div class="owl-item">
                    <div class="background_image" style="background-image:url({{asset('images/home_slider_1.jpg')}})"></div>
                    <div class="home_content_container">
                        <div class="home_content">
                            <div class="home_discount d-flex flex-row align-items-end justify-content-start">
                                <div class="home_discount_num">20</div>
                                <div class="home_discount_text">Discount on the</div>
                            </div>
                            <div class="home_title">New Collection</div>
                            <div class="button button_1 home_button trans_200"><a> href="{{Route('categories.index')}}>Shop NOW!</a></div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Home Slider Navigation -->
            <div class="home_slider_nav home_slider_prev trans_200"><div class=" d-flex flex-column align-items-center justify-content-center"><img src="{{asset('images/prev.png')}}" alt=""></div></div>
            <div class="home_slider_nav home_slider_next trans_200"><div class=" d-flex flex-column align-items-center justify-content-center"><img src="{{asset('images/next.png')}}" alt=""></div></div>

        </div>
    </div>


    <!-- Boxes -->




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
    <script src="{{asset('js/custom.js')}}"></script>

@endsection
