<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\PrivateUserResource;
use App\Models\Address;
use App\Models\Admin;
use App\Models\User;


class RegisterController extends Controller
{
    public function action(RegisterRequest $request){

        $user = User::create($request->only('email','name','password','phone'));
        $address = $request->only('address') ;
        $user_id = $user->id ;
        Address::create([
            'user_id'=>$user_id ,
            'name'=>$address['address']
        ]);
        session()->flash('success' , 'you are registered successfully , please login ');
        return redirect()->route('login');


    }


}
