@extends('front.layout')
@section('header')

    <link rel="stylesheet" type="text/css" href="{{asset('styles/bootstrap-4.1.3/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/checkout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/checkout_responsive.css')}}">

@endsection



@section('content')
    <div class="alert alert-success text-center" style="display:none">
        {{ Session::get('success') }}
    </div>




    <div class="checkout">
        <div class="section_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="checkout_container d-flex flex-xxl-row flex-column align-items-start justify-content-start">

                            <!-- Billing -->
                            <div class="billing checkout_box">
                                <div class="checkout_title">Requesting Product ,Repair or Edit</div>
                                <div class="checkout_form_container">
                                    <form action="" id="checkout_form myfor_id" class="checkout_form">
                                        <div>
                                            <!-- Country -->
                                            <label for="checkout_country">Category*</label>
                                            <select name="checkout_country" id="checkout_country" class="dropdown_item_select checkout_input" require="required">
                                                <option></option>
                                                <option value="2">women</option>
                                                <option value="1">Men</option>
                                                <option value="3">Children</option>
                                                <option value="4"> All </option>

                                            </select>
                                        </div>

                                        <div>
                                            <!-- Company -->
                                            <label for="checkout_company">Type*</label>
                                            <input name="type" type="text" id="checkout_company" class="checkout_input" required>
                                        </div>
                                        <input type="hidden" name="user_id" value="{{$user->id}}" type="text" id="checkout_dcompan" class="checkout_input" required>

                                        <div>
                                            <!-- Company -->
                                            <label for="checkout_company"> Size* </label>
                                            <input name="size" type="text" id="checkout_compan" class="checkout_input" required>
                                        </div>

                                        <div>
                                            <!-- Address -->
                                            <label for="checkout_address">material*</label>
                                            <input type="text" name="material" id="checkout_address" class="checkout_input" required="required">
                                        </div>
                                        <div>
                                            <!-- Address -->
                                            <label for="checkout_address">color*</label>
                                            <input type="text" name="color" id="checkout_addres" class="checkout_input" required="required">
                                        </div>

                                        <div>
                                            <!-- Zipcode -->
                                            <label for="checkout_zipcode">amount*</label>
                                            <input name="amount" type="text" id="checkout_zipco" class="checkout_input" required="required">
                                        </div>
                                        <div>
                                            <!-- Zipcode -->
                                            <label for="checkout_zipcode">Expected Cost*</label>
                                            <input name="expected_cost" type="text" id="checkout_zipcode" class="checkout_input" required="required">
                                        </div>
                                        <div>
                                            <!-- Zipcode -->
                                            <label for="checkout_zipcode">description*</label>
                                            <input name="description" type="text" id="checkout_zipcod" class="checkout_input" required="required">
                                        </div>

                                        <div class="checkout_extra">
                                            <ul>

                                                <li class="billing_info d-flex flex-row align-items-center justify-content-start">

                                                    <div id="myformsubmit" class="checkout_button trans_200"><a style="color:#0b0b0b">place order</a></div>


                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Cart Total -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('footer')
        <script>

        $(document).on('click', '#myformsubmit', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('request.store')}}",
                data: {
                    '_token':"{{csrf_token()}}",
                    'category_id':$("select[name='checkout_country']").val(),
                    'color':$("input[name='color']").val() ,
                    'user_id':$("input[name='user_id']").val() ,
                    'type':$("input[name='type']").val() ,
                    'size':$("input[name='size']").val() ,
                    'material':$("input[name='material']").val() ,
                    'amount':$("input[name='amount']").val() ,
                    'expected_cost':$("input[name='expected_cost']").val() ,
                    'description':$("input[name='description']").val() ,

                },
                success: function (data) {

                    $(".alert-success").css("display", "block");
                    $(".alert-success").append("<P>Your Request Has been submitted .. we will contact you soon .. ");
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
    <script src="{{asset('js/checkout.js')}}"></script>
@endsection
