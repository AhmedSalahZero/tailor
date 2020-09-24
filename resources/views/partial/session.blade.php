

@if(session()->has('success'))
    <div class="alert alert-success text-center ">
        {{session()->get('success')}}
    </div>
@endif

@if(session()->has('fail'))
    <div class="alert alert-info text-center" role="alert">
        <strong>Notice! </strong>  {{session()->get('fail')}}
    </div>
@endif


