@extends('admin.layout')


@section('bar')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Admin panel</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{Route('admin.index')}}">Home</a></li>
                        <li><span>Requests</span></li>
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
                        <th scope="col">user_id</th>
                        <th scope="col">completed</th>
                        <th scope="col">rejected</th>
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

                                <td>
                                    <a href="{{route('get.user.single',['user'=>$request->user_id])}}">
                                        {{$request->user_id}}
                                    </a>

                                </td>


                                <td>

                                    @if($request->status=='pending' )
                                        <form method="post" action=" {{Route('request.complete')}}">
                                            <button type="submit" id="but" >
                                                <i class="fa fa-thumbs-up fa-2x"></i>
                                                <input type="hidden" name="request_id" value="{{$request->id}}">
                                            </button>

                                        </form>
                                    @endif


                                </td>

                                <td>

                                    @if($request->status=='pending' )
                                        <form method="post" action=" {{Route('request.reject')}}">
                                            <button type="submit" id="but" >
                                                <i class="fa fa-thumbs-down fa-2x"></i>
                                                <input type="hidden" name="request_id" value="{{$request->id}}">
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
    #but{
        color: blue;
        border: none;
        background: none;
    }
</style>
@endsection
