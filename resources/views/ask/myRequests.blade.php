<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tailor</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Tailor shop">
    <meta name="viewport" content="width=device-width, initial-scale=1">





    <link rel="stylesheet" href="{{asset('newly/css/bootstrap.min.css')}}" type="text/css">


    <link rel="stylesheet" href="{{asset('newly/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('newly/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('newly/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('newly/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('newly/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('newly/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('newly/css/style.css')}}" type="text/css">




    <link rel="stylesheet" type="text/css" href="{{asset('styles/bootstrap-4.1.3/bootstrap.css')}}">
    <link href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/responsive.css')}}">


</head>
<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">
        <div class="header_content d-flex flex-row align-items-center justify-content-start">

            <!-- Hamburger -->
            <div class="hamburger menu_mm"><i class="fa fa-bars menu_mm" aria-hidden="true"></i></div>

            <!-- Logo -->
            <div class="header_logo">
                <a href="{{Route('page.index')}}"><div><span>Tailor</span></div></a>
            </div>

            <!-- Navigation ----------------------------------------------->


            <nav class="header_nav">
                <ul class="d-flex flex-row align-items-center justify-content-start">
                    <li><a href="{{route('page.index')}} ">Home</a></li>
                    <li><a href="{{route('products.index')}}">products</a></li>
                    <li><a href="{{Route('categories.index')}}">categories</a></li>
                    <li><a href="#">lookbook</a></li>
                    <li><a href="{{route('request.create')}}">ask for product</a></li>
                    <li><a href="#">Edit/Repair</a></li>
                    <li><a href="{{route('contact.index')}}">contact</a></li>
                    @if(Auth()->check() || Auth('admin')->check())
                        <li><a href="{{Route('logout')}}">logout</a></li>
                    @endif
                </ul>
            </nav>

            <!-- Header Extra -->
            @if(Auth()->check() )

                <div class="cart d-flex flex-row align-items-center justify-content-start">
                    <div class="cart_icon"><a href="{{Route('cart.index')}}">
                            <img src="{{asset('images/bag.png')}}" alt="">
                            <div class="cart_num">{{(Auth()->user()->cart->count())}}</div>
                        </a></div>
                </div>





            @endif
        </div>




    </header>

    <!-- Menu -->

    <div class="menu d-flex flex-column align-items-start justify-content-start menu_mm trans_400">
        <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
        <div class="menu_top d-flex flex-row align-items-center justify-content-start">




        </div>
        <div class="menu_search">
            <form action="#" class="header_search_form menu_mm">
                <input type="search" class="search_input menu_mm" placeholder="Search" required="required">
                <button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
                    <i class="fa fa-search menu_mm" aria-hidden="true"></i>
                </button>
            </form>
        </div>
        <nav class="menu_nav">
            <ul class="menu_mm">
                <li class="menu_mm"><a href="{{Route('page.index')}}">home</a></li>
                <li class="menu_mm"><a href="{{Route('products.index')}}">Products</a></li>
                <li class="menu_mm"><a href="#">man</a></li>
                <li class="menu_mm"><a href="#">lookbook</a></li>
                <li class="menu_mm"><a href="{{Route('request.create')}}">Ask for product</a></li>
                <li><a href="#">Edit/Repair</a></li>
                <li class="menu_mm"><a href="{{route('contact.index')}}">contact</a></li>
                @if(Auth()->user())
                    <li><a href="{{Route('logout')}}">logout</a></li>
                @endif
            </ul>
        </nav>
        <div class="menu_extra">
            <div class="menu_social">
                <ul>
                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Sidebar -->

    <div class="sidebar">
        <div class="info">
            <div class="info_content d-flex flex-row align-items-center justify-content-start">

                <!-- Language -->
                @if(Auth()->check() )
                    <div class="info_languages has_children">
                        <div class="language_flag"><img src="{{asset('images/svg1.svg')}}" alt="https://www.flaticon.com/authors/freepik"></div>


                        <div class="dropdown_text">{{Auth()->user()->name}}</div>
                        <div class="dropdown_arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></div>

                        <!-- Language Dropdown Menu -->
                        <ul>
                            <li><a href="{{Route('edit.account')}}">
                                    <div class="language_flag"></div>
                                    <div class="dropdown_text">Edit</div>
                                </a></li>
                            <li><a href="{{route('user.orders')}}">
                                    <div class="language_flag"></div>
                                    <div class="dropdown_text">orders</div>
                                </a></li>
                            <li><a href="{{Route('my.requests')}}">
                                    <div class="language_flag"></div>
                                    <div class="dropdown_text">Requests</div>
                                </a></li>

                        </ul>

                    </div>

                @endif


                <nav class="menu_nav">
                    <ul class="menu_mm">
                        @if(Auth()->guard('admin')->check())
                            <li><a style="
    font-size: 12px;


" href="{{Route('admin.index')}}">admin</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Info -->
        <div class="info">
            <div class="info_content d-flex flex-row align-items-center justify-content-start">


            </div>
        </div>

        <!-- Logo -->
        <div class="sidebar_logo">
            <a href="{{Route('page.index')}}"><div><span>Tailor</span></div></a>
        </div>

        <!-- Sidebar Navigation -->
        <nav class="sidebar_nav">
            <ul>
                <li><a href="{{Route('page.index')}}">home<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                <li><a href="{{Route('products.index')}}">products<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                <li><a href="{{Route('categories.index')}}">Categories<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                <li><a href="#">lookbook<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                <li><a href="{{route('request.create')}}">ask for /Repair<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

                <li><a href="{{route('contact.index')}}">contact<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                @if(Auth()->user() || Auth('admin')->check())
                    <li><a href="{{Route('logout')}}">logout<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

                @else
                    <li><a href="{{Route('loginController')}}">login<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="{{Route('register.index')}}">register<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                @endif
            </ul>
        </nav>


        @if(Auth()->check())


            <div class="cart d-flex flex-row align-items-center justify-content-start">
                <div class="cart_icon"><a href="{{Route('cart.index')}}">
                        <img src="{{asset('images/bag.png')}}" alt="">
                        <div class="cart_num">{{Auth()->user()->cart->count()}}</div>
                    </a>  </div>
                <div class="cart_text">Cart</div>

            </div>

        @endif




    </div>
    <!-- Home -->


    <div class="alert alert-success text-center" style="display:none">
        {{ Session::get('success') }}
    </div>
    <div class="alert alert-info text-center" style="display:none">
        {{ Session::get('fail') }}
    </div>



    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>



    <!-- Header Section Begin -->


    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{Route('page.index')}}"><i class="fa fa-home"></i> Home</a>
                        <span>My Requests</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->


    <div class="row">

        <div class="card-body">
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="text-uppercase bg-dark">
                        <tr class="text-white">
                            <th scope="col">Request_ID</th>
                            <th scope="col">Type</th>
                            <th scope="col">material</th>
                            <th scope="col">size</th>
                            <th scope="col">color</th>
                            <th scope="col">amount</th>
                            <th scope="col">description</th>
                            <th scope="col">expected_cost</th>
                            <th scope="col">category</th>
                            <th scope="col">status</th>


                        </tr>
                        </thead>
                        <tbody>

                        @if(count($requests) == 0 )

                            <tr>
                                <th colspan="13">
                                    <div class="success alert-success text-center">
                                        <h5>
                                            No Requests until now

                                        </h5>

                                    </div>
                                </th>

                            </tr>



                        @else

                            @foreach($requests as $request)
                                @if($request->user_id == Auth()->user()->id)
                                <tr >

                                    <th scope="row">{{$request->id}}</th>
                                    <td>{{$request->type}}</td>
                                    <td>{{$request->material}}</td>
                                    <td>
                                        {{$request->size}}
                                    </td>
                                    <td>{{$request->color}}</td>

                                    <td>
                                        {{$request->amount}}
                                    </td>
                                    <td>
                                        {{$request->description}}
                                    </td>
                                    <td>
                                        {{(new \App\Cart\Money($request->expected_cost))->formatted()}}
                                    </td>
                                    <td>
                                        {{\App\Models\Category::where('id',$request->category_id)->first()->name}}
                                    </td>
                                    <td>
                                        {{$request->status}}
                                    </td>

                                </tr>
                                @endif
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>




    </div>








</div>




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

<style>
    #myformsubmit:hover{
        cursor:pointer;
    }
</style>

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/mixitup.min.js')}}"></script>
<script src="{{asset('js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('js/jquery.slicknav.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>


</body>
</html>




