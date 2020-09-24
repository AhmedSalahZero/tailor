@extends('admin.layout')

@section('bar')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Admin panel</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{Route('admin.index')}}">Home</a></li>
                        <li><span>Transactions</span></li>
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
                        <th scope="col">Order_ID</th>
                        <th scope="col">User_ID</th>
                        <th scope="col">totalPrice</th>

                    </tr>
                    </thead>
                    <tbody>
                    @if(count($transactions) == 0 )
                        <tr>
                            <th colspan="3">
                                <div class="success alert-success text-center">
                                    <h5>
                                        No Transaction for this user yet

                                    </h5>

                                </div>
                            </th>

                        </tr>

                        @else
                       @foreach($transactions as $transaction)
                           <tr >

                               <th scope="row"><a href="{{Route('get.single.order',['order'=>$transaction->order_id])}}">  {{$transaction->order_id}} </a></th>

                               <td>

                                   <a href="{{route('get.user.single',['user'=>$transaction->user_id])}}">
                                       {{$transaction->user_id}}
                                   </a>
                               </td>
                               <td>
                                   {{(new \App\Cart\Money($transaction->amount))->formatted()}}
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
