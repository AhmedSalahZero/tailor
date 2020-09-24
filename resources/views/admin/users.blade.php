@extends('admin.layout')


@section('bar')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Admin panel</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{Route('admin.index')}}">Home</a></li>
                        <li><span>Users</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">
                    <img class="avatar user-thumb" src="{{asset('admin/images/author/avatar.png')}}" alt="avatar">
                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{Auth()->guard('admin')->user()->name}}<i class="fa fa-angle-down"></i></h4>
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
        <a href="{{Route('admin.add.user')}}"><i class="fa fa-user-plus fa-2x"></i> </a>
        <div class="single-table">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead class="text-uppercase bg-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">ShippingMethod</th>
                        <th scope="col">Transactions</th>
                        <th scope="col">Requests</th>
                        <th scope="col">Edit</th>
                        <th scope="col">delete</th>
                    </tr>
                    </thead>
                    <tbody>
                 @if(isset($users))
                     @foreach($users as $user)
                         <tr class="userNo{{$user->id}}">
                             <th scope="row">{{$user->id}}</th>
                             <td>{{$user->name}}</td>
                             <td>{{$user->email}}</td>
                             <td>{{$user->phone}}</td>
                             <td><a href="#"> {{$user->shippingMethod->name}}   </a></td>
                             <td><a href="{{Route('user.transactions',['user'=>$user->id])}}"> <i class="fa fa-newspaper-o fa-2x"></i></a></td>
                             <td><a href="{{Route('customer.request',['user'=>$user->id])}}"><i class="fa fa-hourglass-half fa-2x"></i></a></td>
                             <td><a href="{{Route('admin.users.edit',$user->id)}}"><i class="fa fa-edit fa-2x"></i>  <span class="text-muted"></span></a></td>
                             <form>
                                 <td><a user_id="{{$user->id}}" id="delete_user" href=""><i class="fa fa-remove fa-2x"></i><span class="text-muted"></span></a></td>
                             </form>

                         </tr>
                     @endforeach



                 @else
                     <tr class="userNo{{$user->id}}">
                         <th scope="row">{{$user->id}}</th>
                         <td>{{$user->name}}</td>
                         <td>{{$user->email}}</td>
                         <td>{{$user->phone}}</td>
                         <td><a href="#"> {{$user->shippingMethod->name}}   </a></td>
                         <td><a href="{{Route('user.transactions',['user'=>$user->id])}}"> <i class="fa fa-newspaper-o fa-2x"></i></a></td>
                         <td><a href="#"><i class="fa fa-hourglass-half fa-2x"></i></a></td>
                         <td><a href="{{Route('admin.users.edit',$user->id)}}"><i class="fa fa-edit fa-2x"></i>  <span class="text-muted"></span></a></td>
                         <form>
                             <td><a user_id="{{$user->id}}" id="delete_user" href=""><i class="fa fa-remove fa-2x"></i><span class="text-muted"></span></a></td>
                         </form>

                     </tr>

                     @endif


                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection


@section('footer')
    <script>

        $(document).on('click', '#delete_user', function (e) {
            e.preventDefault();
            //   var product_id= $('#delete_cart').attr('getId')
            var user_id = $(this).attr('user_id')


            $.ajax({
                type: 'delete',
                dataType   : 'json',
                content:'json',
                url: '{{Route('admin.delete.user')}}',
                data: {
                    '_token':"{{csrf_token()}}" ,
                    'user_id':user_id ,

                },
                success: function (data) {
                    $('.userNo'+data.id).remove();
                    console.log('response', data);
                    $(".alert-success").css("display", "block");
                    $(".alert-success").append("<P>User has been deleted successfully");
                }, error: function (data) {
                    console.log('response', data);
                    $(".alert-success").css("display", "block");
                    $(".alert-success").append("<P> Error happened while deleting the user ");

                }
            });
        });

    </script>


@endsection
