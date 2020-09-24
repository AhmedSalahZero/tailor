@extends('admin.layout')


@section('bar')

    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Admin panel</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{Route('admin.index')}}">Home</a></li>
                        <li><a href="{{Route('admin.products')}}">products</a></li>
                        <li><span>Add Product</span></li>
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
        <h4 class="header-title">Add new user </h4>
        <form method="post" enctype="multipart/form-data" action="{{Route('admin.store.product')}}">
        <div class="form-group" >
            <label for="product_n" class="">Name</label>
            <input class="form-control" id="product_n" name="product_name" type="text" >
        </div>
        <div class="form-group">
            <label for="product_n" class="">Price</label>
            <input class="form-control" id="product_n"  type="number" name="product_price">
        </div>
        <div class="form-group">
            <label for="product_q" class="">Size</label>
            <input class="form-control" id="product_q" type="text" name="product_size">
        </div>

            <div class="form-group" >
                <label for="product_dn" class="">Quantity</label>
                <input class="form-control" id="product_dn" name="quantity" type="number" >
            </div>

        <div class="form-group">
            <label id="variations_type" class="col-form-label">Type</label>
            <select id="variations_type" class="custom-select" name="variation_type_id">
                @foreach($variations as $variation)
                    <option value="{{$variation->id}}">{{$variation->name}}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label id="color1" class="col-form-label">Color</label>
            <select id="color1" class="custom-select" name="color_id">
                @foreach($colors as $color)
                    <option value="{{$color->id}}">{{$color->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for ='cate' class="col-form-label">Category</label>
            <select id="cate" class="custom-select" name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

            <div class="form-group">
                <label for ='tagg' class="col-form-label">Tag</label>
                <select id="tagg" class="custom-select" name="tag_id">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>



        <div class="form-group">
            <label for="bran" class="col-form-label">Brand</label>
            <select id="bran" class="custom-select" name="brand_id">

                @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="custom-file form-group">
            <input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
            <label class="custom-file-label" for="inputGroupFile01" >Choose Image</label>
        </div>

            <div class="form-group" >
                <label for="small_desc" class="">small description</label>
                <input class="form-control" id="small_desc" name="small_desc" type="text" >
            </div>

            <div class="form-group" >
                <label for="description" class="">long description </label>
                <textarea class="form-control" id="description" name="description" type="text" ></textarea>
            </div>


        <button type="submit" id="sub_product_add" class="btn btn-primary mt-4 pr-4 pl-4" style="margin-left: 40%">Submit</button>
        </form>
    </div>

    <div class="alert alert-success text-center" style="display:none">

    </div>


@endsection


@section('footer')
{{--    <script>--}}

{{--        $(document).on('click', '#sub_product_add', function (e) {--}}
{{--            e.preventDefault();--}}
{{--            $.ajax({--}}
{{--                type: 'POST',--}}
{{--                url: '{{Route('admin.store.product')}}',--}}
{{--                enctype: 'multipart/form-data',--}}
{{--                processData: false,--}}
{{--                data: {--}}
{{--                    '_token':"{{csrf_token()}}",--}}
{{--                    'product_name':$("input[name='product_name']").val() ,--}}
{{--                    'image_path':$("input[name='image']:file").val() ,--}}
{{--                    'product_price':$("input[name='product_price']").val() ,--}}
{{--                    'product_size':$("input[name='product_size']").val(),--}}
{{--                    'variation_type_id':$("select[name='variation_type_id']").val(),--}}
{{--                    'color_id':$("select[name='color_id']").val(),--}}
{{--                    'brand_id':$("select[name='brand_id']").val(),--}}
{{--                    'category_id':$("select[name='category_id']").val(),--}}
{{--                    'phone':$("input[name='phone']").val() ,--}}
{{--                    'password':$("input[name='password']").val() ,--}}
{{--                },--}}
{{--                success: function (data) {--}}
{{--                    if(data.status == true)--}}
{{--                    {--}}
{{--                        $(".alert-success").css("display", "block");--}}
{{--                        $(".alert-success").append("<P>user created  Successfully")--}}
{{--                    }--}}
{{--                    else--}}
{{--                    {--}}

{{--                        $(".alert-info").css("display", "block");--}}
{{--                        $(".alert-info").append("<P> someThing goes wrong! ");--}}
{{--                    }--}}
{{--                }, error: function (data) {--}}

{{--                }--}}
{{--            });--}}
{{--        });--}}


{{--    </script>--}}

@endsection
