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

@section('head1')





@endsection



@section('content')
    <div class="alert alert-success text-center" style="display:none">
        {{ Session::get('success') }}
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
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__content">
                        <div class="contact__address">
                            <h5>Contact info</h5>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-map-marker"></i> Address</h6>
                                    <p>{{$info->address}} </p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-phone"></i> Phone</h6>
                                    <p><span>{{$info->phone}}</span></p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-headphones"></i> Support</h6>
                                    <p>{{$info->email}}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="contact__form">
                            <h5>SEND MESSAGE</h5>
                            <form method="post">
                                <input type="text" placeholder="Name" name="name">
                                <input type="text" placeholder="Email" name="email">
                                <input type="number" placeholder="Phone" name="phone">
                                <textarea placeholder="Message" name="message"></textarea >
                                <button id="sub_btn"  class="site-btn">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Contact Section End -->



@endsection


@section('footer')
    <script>

        $(document).on('click', '#sub_btn', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('contact.post')}}",
                data: {
                    '_token':"{{csrf_token()}}",
                    'name':$("input[name='name']").val() ,
                    'email':$("input[name='email']").val() ,
                    'phone':$("input[name='phone']").val() ,
                    'message':$("textarea[name='message']").val() ,
                },
                success: function (data) {

                    $(".alert-success").css("display", "block");
                    $(".alert-success").append("<P>Your Message Has been sent .. Thanks");
                }, error: function (data) {
                    $(".alert-success").css("display", "block");
                    $(".alert-success").append("<P>invalid info .. please check the information again ");

                }
            });
        });


    </script>
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


@endsection
