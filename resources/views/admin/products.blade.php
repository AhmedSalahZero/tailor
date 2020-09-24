@extends('admin.layout')

@section('bar')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Admin panel</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{Route('admin.index')}}">Home</a></li>
                        <li><span>Products</span></li>
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
        <a href="{{Route('admin.add.product')}}"><i class="fa fa-plus-square fa-2x"></i> </a>
        <div class="single-table">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead class="text-uppercase bg-light">
                    <tr>
                        <th scope="col">Product_id</th>
                        <th scope="col">product_name</th>
                        <th scope="col">tag_name</th>
                        <th scope="col">brand_name</th>
                        <th scope="col">Size</th>
                        <th scope="col">price</th>
                        <th scope="col">quantity</th>
                        <th scope="col">Type</th>
                        <th scope="col">category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        @foreach($product->variations as $var)


                                <tr >

                                    <th scope="row">  {{$product->id}}

                                    </th>
                                    <td>
                                        {{$product->name}}
                                    </td>
                                    <td>{{\App\Models\Tag::where('id',$product->tag_id)->first()->name}}</td>
                                    <td>
                                       {{ \App\Models\Product_Brand::where('id',$product->brand_id)->first()->brand_name}}
                                    </td>
                                    <td>{{$var->name}}</td>

                                    <td>

                                        {{$var->price->formatted()}}
                                    </td>
                                    <td>

                                        {{$var->stockCount()}}
                                    </td>

                                    <td>

                                        {{$var->type->name}}
                                    </td>
                                    <td>

                                        {{$product->categories->first()->name}}
                                    </td>

                                    <td>
                                        <img src="{{asset($product->image)}}" style="max-height: 71px ; max-width: 150px;min-width: 150px;max-height: 71px" >
                                    </td>


                                    <td>
                                        <a href="{{route('product.edit',$var->id)}}"><i class="fa fa-edit fa-2x"></i>  <span class="text-muted"></span></a>

                                    </td>




                                </tr>


                            @endforeach

                    @endforeach



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
