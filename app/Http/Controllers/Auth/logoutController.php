<?php


namespace App\Http\Controllers\Auth;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class logoutController
{
    public function logout()
    {
        Auth()->logout();
       Auth()->guard('admin')->logout();
        return redirect()->route('products.index');
    }

}
