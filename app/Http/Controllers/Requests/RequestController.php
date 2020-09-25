<?php

namespace App\Http\Controllers\Requests;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataRequest;
use App\Models\ProductVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function __construct(){
        $this->middleware('adminOrUser');
    }

    public function index()
    {

    }


    public function create()
    {

        return view('ask.index')->with('user' , Auth()->user());

    }


    public function store(StoreDataRequest $request)
    {


       \App\Models\Request::create($request->all());


    }


    public function show($id)
    {



    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        //
    }
    public function myRequests()
    {
        return view('ask.myRequests')->with('requests' , \App\Models\Request::all());

    }

}
