@extends('admin.layout')


@section('bar')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Admin panel</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{Route('admin.index')}}">Home</a></li>
                        <li><span>Messages</span></li>
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

        <div class="single-table">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead class="text-uppercase bg-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Message</th>
                        <th scope="col">status</th>
                        <th scope="col">created_at</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Read</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($messages) == 0 )
                        <tr>
                            <th colspan="9">
                                <div class="success alert-success text-center">
                                    <h5>
                                        No Messages until now

                                    </h5>

                                </div>
                            </th>

                        </tr>

                    @else

                    @foreach($messages as $message)
                        <tr class="message{{$message->id}}">

                            <th scope="row">{{$message->id}}</th>
                            <td>{{$message->name}}</td>
                            <td>{{$message->email}}</td>
                            <td>
                                {{$message->phone}}
                            </td>
                            <td>{{$message->message}}</td>
                            <td>{{$message->status}}</td>
                            <td>
                                {{$message->created_at}}
                            </td>


                            <td >
                                <form method="post">
                                    <button  id="xyz" >
                                        <i id="butt" class="fa fa-remove fa-2x"></i>
                                        <input type="hidden" name="message_id" value="{{$message->id}}">
                                    </button>

                                </form>
                            </td>

    <td >

        @if($message->status=='unread' )
            <form method="post" action="{{Route('message.read')}}">
                <button  id="but" >
                    <i class="fa fa-thumbs-up fa-2x"></i>
                    <input type="hidden" name="message_id" value="{{$message->id}}">
                </button>

            </form>
        @endif


    </td>
                        </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


@section('footer')
<style>
    #but,#xyz{
        color: blue;
        border: none;
        background: none;
    }
</style>

<script>

    $(document).on('click', '#butt', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            url: "{{route('message.delete')}}",
            data: {
                '_token':"{{csrf_token()}}",
                'message_id':$("input[name='message_id']").val(),
            },
            success: function (data) {
                $('.message'+data.id).remove();
            }, error: function (reject) {


            }
        });
    });
    </script>
@endsection
