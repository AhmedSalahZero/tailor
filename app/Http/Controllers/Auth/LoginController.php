<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\PrivateUserResource;
use http\Env\Response;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function action(LoginRequest $request){

        if(!Auth()->attempt($request->only('email','password'),$request->remember == 'on')
        && !Auth()->guard('admin')->attempt($request->only('email','password'),$request->remember == 'on'))
        {
            session()->flash('fail','your credentials are invalid ');
            return back();
        }
        session()->flash('success','you are logged in successfully');
        return redirect()->route('products.index');

    }
}
