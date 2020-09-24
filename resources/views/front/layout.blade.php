<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tailor</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Tailor shop">
    <meta name="viewport" content="width=device-width, initial-scale=1">




    @yield('header')

    <link rel="stylesheet" type="text/css" href="{{asset('styles/bootstrap-4.1.3/bootstrap.css')}}">
    <link href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/responsive.css')}}">
    @yield('style')






    @yield('head1')
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
                    <li><a href="{{route('request.create')}}">ask for /Repair<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
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
                <li><a href="{{route('request.create')}}">ask for /Repair<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
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




@yield('content')






<!-- Footer -->

    <footer class="footer">
        <div class="footer_content">
            <div class="section_container">
                <div class="container">
                    <div class="row">

                        <!-- About -->
                        <div class="col-xxl-3 col-md-6 footer_col">
                            <div class="footer_about">
                                <!-- Logo -->
                                <div class="footer_logo">
                                    <a href="#"><div><span>Tailor</span></div></a>
                                </div>
                                <div class="footer_about_text">
                                    <p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam fringilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
                                </div>
                                <div class="cards">
                                    <ul class="d-flex flex-row align-items-center justify-content-start">
                                        <li><a href="#"><img src="{{asset('images/card_1.jpg')}}" alt=""></a></li>
                                        <li><a href="#"><img src="{{asset('images/card_2.jpg')}}" alt=""></a></li>
                                        <li><a href="#"><img src="{{asset('images/card_3.jpg')}}" alt=""></a></li>
                                        <li><a href="#"><img src="{{asset('images/card_4.jpg')}}" alt=""></a></li>
                                        <li><a href="#"><img src="{{asset('images/card_5.jpg')}}" alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Questions -->
                        <div class="col-xxl-3 col-md-6 footer_col">
                            <div class="footer_questions">
                                <div class="footer_title">questions</div>
                                <div class="footer_list">
                                    <ul>
                                        <li><a href="#">About us</a></li>
                                        <li><a href="#">Track Orders</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">Jobs</a></li>
                                        <li><a href="#">Shipping</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Partners</a></li>
                                        <li><a href="#">Bloggers</a></li>
                                        <li><a href="#">Support</a></li>
                                        <li><a href="#">Terms of Use</a></li>
                                        <li><a href="#">Press</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Blog -->
                        <div class="col-xxl-3 col-md-6 footer_col">
                            <div class="footer_blog">
                                <div class="footer_title">blog</div>
                                <div class="footer_blog_container">

                                    <!-- Blog Item -->
                                    <div class="footer_blog_item d-flex flex-row align-items-start justify-content-start">
                                        <div class="footer_blog_image"><a href="blog.html"><img src="{{asset('images/footer_blog_1.jpg')}}" alt=""></a></div>
                                        <div class="footer_blog_content">
                                            <div class="footer_blog_title"><a href="blog.html">what shoes to wear</a></div>
                                            <div class="footer_blog_date">june 06, 2018</div>
                                            <div class="footer_blog_link"><a href="blog.html">Read More</a></div>
                                        </div>
                                    </div>

                                    <!-- Blog Item -->
                                    <div class="footer_blog_item d-flex flex-row align-items-start justify-content-start">
                                        <div class="footer_blog_image"><a href="blog.html"><img src="{{asset('images/footer_blog_2.jpg')}}" alt=""></a></div>
                                        <div class="footer_blog_content">
                                            <div class="footer_blog_title"><a href="blog.html">trends this year</a></div>
                                            <div class="footer_blog_date">june 06, 2018</div>
                                            <div class="footer_blog_link"><a href="blog.html">Read More</a></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Contact -->
                        <div class="col-xxl-3 col-md-6 footer_col">
                            <div class="footer_contact">
                                <div class="footer_title">contact</div>
                                <div class="footer_contact_list">
                                    <ul>
                                        <li class="d-flex flex-row align-items-start justify-content-start"><span>C.</span><div>Your Company Ltd</div></li>
                                        <li class="d-flex flex-row align-items-start justify-content-start"><span>A.</span><div>1481 Creekside Lane  Avila Beach, CA 93424, P.O. BOX 68</div></li>
                                        <li class="d-flex flex-row align-items-start justify-content-start"><span>T.</span><div>+53 345 7953 32453</div></li>
                                        <li class="d-flex flex-row align-items-start justify-content-start"><span>E.</span><div>office@youremail.com</div></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social -->
        <div class="footer_social">
            <div class="section_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="footer_social_container d-flex flex-row align-items-center justify-content-between">
                                <!-- Instagram -->
                                <a href="#">
                                    <div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                                        <div class="footer_social_icon"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                        <div class="footer_social_title">instagram</div>
                                    </div>
                                </a>
                                <!-- Google + -->
                                <a href="#">
                                    <div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                                        <div class="footer_social_icon"><i class="fa fa-google-plus" aria-hidden="true"></i></div>
                                        <div class="footer_social_title">google +</div>
                                    </div>
                                </a>
                                <!-- Pinterest -->
                                <a href="#">
                                    <div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                                        <div class="footer_social_icon"><i class="fa fa-pinterest" aria-hidden="true"></i></div>
                                        <div class="footer_social_title">pinterest</div>
                                    </div>
                                </a>
                                <!-- Facebook -->
                                <a href="#">
                                    <div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                                        <div class="footer_social_icon"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                        <div class="footer_social_title">facebook</div>
                                    </div>
                                </a>
                                <!-- Twitter -->
                                <a href="#">
                                    <div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                                        <div class="footer_social_icon"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                        <div class="footer_social_title">twitter</div>
                                    </div>
                                </a>
                                <!-- YouTube -->
                                <a href="#">
                                    <div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                                        <div class="footer_social_icon"><i class="fa fa-youtube" aria-hidden="true"></i></div>
                                        <div class="footer_social_title">youtube</div>
                                    </div>
                                </a>
                                <!-- Tumblr -->
                                <a href="#">
                                    <div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
                                        <div class="footer_social_icon"><i class="fa fa-tumblr-square" aria-hidden="true"></i></div>
                                        <div class="footer_social_title">tumblr</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>

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

@yield('footer')


</body>
</html>
