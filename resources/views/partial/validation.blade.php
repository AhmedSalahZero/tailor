@if($errors->any())

    <div class="alert alert-danger text-center" >
        <ul>
    @foreach($errors->all() as $error)
                <li style="font-size: 17px">{{$error}}</li> <br>
        @endforeach
        </ul>
    </div>
    @endif
