@extends('admin.layout')


@section('bar')

    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Admin panel</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{Route('admin.index')}}">Home</a></li>
                        <li><a href="{{Route('admins.index')}}">Admins</a></li>
                        <li><span>Add Admin</span></li>
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
    <h4 class="header-title">Add new admin </h4>
    <div class="form-group" >
        <input class="form-control" name="name" type="text" placeholder="name" >
    </div>
    <div class="form-group">
        <input class="form-control" placeholder="email" type="email" name="email">
    </div>
    <div class="form-group">
        <input class="form-control" name="address" type="text" placeholder="address" >
    </div>
    <div class="form-group">
        <input class="form-control" name="phone" type="tel"id="example-tel-input" placeholder="Phone">
    </div>
    <div class="form-group">
        <input class="form-control" name="salary" type="text"id="example-tel-input" placeholder="salary">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Enter new password">
    </div>
    <button type="submit" id="sub_admin_add" class="btn btn-primary mt-4 pr-4 pl-4" style="margin-left: 40%">Submit</button>
</div>
<div class="alert alert-success text-center" style="display:none">

</div>


@endsection


@section('footer')
    <script>

        $(document).on('click', '#sub_admin_add', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{Route('admin.store.admin')}}',
                data: {
                    '_token':"{{csrf_token()}}",
                    'name':$("input[name='name']").val() ,
                    'email':$("input[name='email']").val() ,
                    'salary':$("input[name='salary']").val() ,
                    'address':$("input[name='address']").val() ,
                    'phone':$("input[name='phone']").val() ,
                    'password':$("input[name='password']").val() ,
                },
                success: function (data) {
                    if(data.status == true)
                    {
                        $(".alert-success").css("display", "block");
                        $(".alert-success").append("<P>Admin created  Successfully")
                    }
                    else
                    {

                        $(".alert-info").css("display", "block");
                        $(".alert-info").append("<P> someThing goes wrong! ");
                    }
                }, error: function (data) {

                }
            });
        });


    </script>

@endsection
