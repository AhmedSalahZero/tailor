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
                        <span>Edit my account</span>
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
                            <h5>my account Info </h5>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-male"></i> name</h6>
                                    <p>{{$user->name}} </p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-phone"></i> Phone</h6>
                                    <p><span>{{$user->phone}}</span></p>
                                </li>


                                <li>
                                    <h6><i class="fa fa-home"></i> Address </h6>
                                    <p>{{$user->addresses->first()->name}}</p>
                                </li>

                                <li>
                                    <h6><i class="fa fa-car"></i> ShippingMethod </h6>
                                    <p>{{$user->shippingMethod->name}}</p>
                                </li>

                            </ul>
                        </div>

                        <div class="contact__form">
                            <h5>Edit INFO </h5>
                            <form method="post" id="info_form">
                                <input type="text" placeholder="Name" name="name">
                                <input type="text" placeholder="Phone" name="phone">
                                <input type="text" placeholder="Address" name="address">
                                <input type="hidden"value="{{Auth()->user()->id}}" name="user_id">
                                <select type="text" placeholder="shippingMethod" name="shippingMethod">
                                <option value="1" {{(Auth()->user()->shippingMethod->id == 1 ? "selected": "")}}> none </option>
                                    <option value="2" {{(Auth()->user()->shippingMethod->id == 2 ? "selected": "")}}> aramex</option>

                                </select>
                                <input type="password" placeholder="Enter Your Old Password" name="old_pass">
                                <button id="sub_info"  class="site-btn">Edit Info </button>
                            </form>
                        </div>
                        <br> <br>

                        <div class="contact__form">
                            <h5>Edit My Password </h5>
                            <form method="post" id="pass_form">
                                <input type="password" placeholder="Old Password" name="old_password" required>
                                <input type="password" placeholder="New Password" name="new_password" required>
                                <input type="password" placeholder="Confirm new Password" name="confirm_password" required>
                                <button id="sub_pass"  class="site-btn">Edit password</button>
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

        $(document).on('click', '#sub_info', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: "{{route('edit.info.store')}}",
                data: {
                    '_token':"{{csrf_token()}}",
                    'name':$("input[name='name']").val() ,
                    'email':$("input[name='email']").val() ,
                    'shippingMethod':$("select[name='shippingMethod']").val(),
                    'address':$("input[name='address']").val() ,
                    'phone':$("input[name='phone']").val() ,
                    'old_pass':$("input[name='old_pass']").val() ,
                },
                success: function (data) {
                    if(data.status == true)
                    {

                        $(".alert-success").css("display", "block");
                        $(".alert-success").append("<P>Your Info Has been Edited")
                    }
                    else
                    {

                        $(".alert-info").css("display", "block");
                        $(".alert-info").append("<P> Incorrect Password ");
                    }
                }, error: function (data) {

                }
            });
        });


    </script>
    <script>

        $(document).on('click', '#sub_pass', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'PUT',
                url: "{{route('edit.password.store')}}",
                data: {
                    '_token':"{{csrf_token()}}",
                    'old_password':$("input[name='old_password']").val() ,
                    'new_password':$("input[name='new_password']").val() ,
                    'confirm_password':$("input[name='confirm_password']").val() ,
                },
                success: function (data) {
                    if(data.status == true)
                    {

                        $(".alert-success").css("display", "block");
                        $(".alert-success").append("<P>Your password Has been Edited")
                    }
                    else
                    {

                        $(".alert-info").css("display", "block");
                        $(".alert-info").append("<P> Incorrect Password ");
                    }
                }, error: function (data) {

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
