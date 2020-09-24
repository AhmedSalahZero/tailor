@extends('admin.layout')


@section('bar')

    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Admin panel</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{Route('admin.index')}}">Home</a></li>
                        <li><a href="{{Route('admin.products')}}">Products</a></li>
                        <li><span>Edit Product</span></li>
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
        <h4 class="header-title">Edit Product </h4>
        <div class="form-group" >
            <label for="price" class="">Price</label>

            <input id="price" class="form-control" name="new_price" type="number" placeholder="newPrice" value="{{$productVariation->price->amount()}}">
        </div>
        <div class="form-group">
            <label for="quantity" class="">Quantity</label>
            <input id="quantity" class="form-control" placeholder="new_quantity" type="number" name="new_quantity" value="{{$productVariation->stockCount()}}">
        </div>

            <input type="hidden" name="pro_id" value="{{$productVariation->id}}">
        <button  id="edit_product" class="btn btn-primary mt-4 pr-4 pl-4" style="margin-left: 40%">Submit</button>
    </div>
    <div class="alert alert-success text-center" style="display:none">

    </div>


@endsection


@section('footer')
    <script>

        $(document).on('click', '#edit_product', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{Route('products.update')}}',
                data: {
                    '_token':"{{csrf_token()}}",
                    'new_price':$("input[name='new_price']").val() ,
                    'new_quantity':$("input[name='new_quantity']").val() ,
                    'pro_id':$("input[name='pro_id']").val() ,


                },
                success: function (data) {
                    $(".alert-success").css("display", "block");
                    $(".alert-success").append("<P>Product Updated  Successfully")
                }, error: function (data) {
                    $(".alert-info").css("display", "block");
                    $(".alert-info").append("<P> someThing goes wrong! ");
                }
            });
        });


    </script>

@endsection
