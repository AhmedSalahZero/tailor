@extends('admin.layout')


@section('bar')

    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Admin panel</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{Route('admin.index')}}">Home</a></li>
                        <li><a href="{{Route('admin.users')}}">Users</a></li>
                        <li><span>Edit</span></li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">
                    <img class="avatar user-thumb" src="{{asset('admin/images/author/avatar.png')}}" alt="avatar">
                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{Auth('admin')->user()->name}}<i class="fa fa-angle-down"></i></h4>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{Route('products.index')}}">Back to website</a>
                        <a class="dropdown-item" href="{{Route('logout')}}">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('content')

<div class="card-body">
    <h4 class="header-title">Edit {{$user->name}} Data </h4>
    <div class="form-group" >
        <input class="form-control" name="name" type="text" placeholder="name" value="{{$user->name}}">
    </div>
    <div class="form-group">
        <input class="form-control" placeholder="email" type="email" name="email" value="{{$user->email}}">
    </div>
    <div class="form-group">
        <input class="form-control" name="address" type="text" placeholder="address" value="{{$user->addresses->first()->name}}">
    </div>
    <div class="form-group">
        <input class="form-control" name="phone" type="tel"id="example-tel-input" placeholder="Phone" value="{{$user->phone}}">
    </div>
    <div class="form-group">
        <input type="hidden" class="form-control"  name="user_id" value="{{$user->id}}">
        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Enter new password">
    </div>
    <div class="form-group">
        <label class="col-form-label">ShippingMethod</label>
        <select name="shipping_method_id" class="custom-select">
            <option value="1" {{($user->shippingMethod->id == 1 ? "selected": "")}}>none</option>
            <option value="2" {{($user->shippingMethod->id == 2 ? "selected": "")}}>aramex</option>
        </select>
    </div>
    <button type="submit" id="sub_form_edit" class="btn btn-primary mt-4 pr-4 pl-4" style="margin-left: 40%">Submit</button>
</div>
<div class="alert alert-success text-center" style="display:none">

</div>


@endsection


@section('footer')
    <script>

        $(document).on('click', '#sub_form_edit', function (e) {
            e.preventDefault();
            var user_id = $("input[name='user_id']").val() ;

            $.ajax({
                type: 'PUT',
                url: '{{Route('admin.users.update')}}',
                data: {
                    '_token':"{{csrf_token()}}",
                    'name':$("input[name='name']").val() ,
                    'user_id':$("input[name='user_id']").val() ,
                    'email':$("input[name='email']").val() ,
                    'shipping_method_id':$("select[name='shipping_method_id']").val(),
                    'address':$("input[name='address']").val() ,
                    'phone':$("input[name='phone']").val() ,
                    'password':$("input[name='password']").val() ,
                },
                success: function (data) {
                    if(data.status == true)
                    {
                        $(".alert-success").css("display", "block");
                        $(".alert-success").append("<P>Info Has been Updated")
                    }
                    else
                    {

                        $(".alert-info").css("display", "block");
                        $(".alert-info").append("<P> something Wrong happens ");
                    }
                }, error: function (data) {

                }
            });
        });


    </script>

@endsection
