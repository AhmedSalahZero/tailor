@extends('admin.layout')


@section('bar')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Admin panel</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{Route('admin.index')}}">Home</a></li>
                        <li><span>Admins</span></li>
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
    <!--bar-->

  <!--EndBar-->


    <div class="card-body">

        <a href="{{Route('admin.add')}}"><i class="fa fa-user-plus fa-2x"></i> </a>

        <div class="single-table">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead class="text-uppercase bg-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Edit</th>
                        <th scope="col">delete</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($admins as $admin)
                       <tr class="adminNo{{$admin->id}}">
                           <th scope="row">{{$admin->id}}</th>
                           <td>{{$admin->name}}</td>
                           <td>{{$admin->email}}</td>
                           <td>{{$admin->address}}</td>
                           <td>{{$admin->salary}}</td>
                           <td>{{$admin->phone}}</td>
                           <td><a href="{{Route('admin.edit.admin',$admin->id)}}"><i class="fa fa-edit fa-2x"></i>  <span class="text-muted"></span></a></td>
                           <td><a admin_id="{{$admin->id}}" id="delete_admin" href=""><i class="fa fa-remove fa-2x"></i><span class="text-muted"></span></a></td>

                       </tr>
                   @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection


@section('footer')
    <script>

        $(document).on('click', '#delete_admin', function (e) {
            e.preventDefault();
            var admin_id = $(this).attr('admin_id')
            $.ajax({
                type: 'delete',
                dataType   : 'json',
                content:'json',
                url: '{{Route('admin.delete.admin')}}',
                data: {
                    '_token':"{{csrf_token()}}" ,
                    'admin_id':admin_id ,

                },
                success: function (data) {
                    $('.adminNo'+data.id).remove();
                    console.log('response', data);
                    $(".alert-success").css("display", "block");
                    $(".alert-success").append("<P>Admin has been deleted successfully");
                }, error: function (data) {
                    console.log('response', data);
                    $(".alert-success").css("display", "block");
                    $(".alert-success").append("<P> Error happened while deleting the Admin ");

                }
            });
        });

    </script>


@endsection
