@extends('admin.layout')

@section('bar')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Admin panel</h4>

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

    <div class="main-content-inner">
        <div class="row">
            <!-- seo fact area start -->
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-6 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg1">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-thumb-up"></i> Orders </div>
                                    <h5 style="color:white">{{(\App\Models\Transaction::all()->count())}}</h5>
                                </div>
                                <canvas id="seolinechart1" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg2">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-share"></i> Requests </div>  <h5 style="color:white">{{(\App\Models\Request::all()->count())}}</h5>

                                </div>
                                <canvas id="seolinechart2" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-lg-0">
                        <div class="card">
                            <div class="seo-fact sbg3">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon">Admins</div>   <h5 style="color:white">{{(\App\Models\Admin::all()->count())}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="seo-fact sbg4">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon">Users</div>  <h5 style="color:white">{{(\App\Models\User::all()->count())}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- seo fact area end -->
            <!-- Social Campain area start -->
            <div class="col-xl-4 col-lg-5 col-md-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex flex-wrap justify-content-between mb-4 align-items-center">
                            <h4 class="header-title mb-0">Team Member</h4>
                        </div>
                        <div class="member-box">
                            @foreach(\App\Models\Admin::all() as $admin)
                                <div class="s-member">
                                    <div class="media align-items-center">
                                        <div class="media-body ml-5">
                                            <p>{{$admin->name}}</p><span></span>
                                        </div>
                                        <div class="tm-social">
                                            <a href="#">{{$admin->phone}}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
