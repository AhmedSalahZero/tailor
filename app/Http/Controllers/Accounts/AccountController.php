<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {

        $accountInfo = User::where('id' , Auth()->user()->id)->first();
        return view('edit.index')->with('user' , $accountInfo);


    }

    public function store(Request $request)
    {
        $newData = $request->all();
        $oldData = Auth()->user();

        if(!Hash::check($newData['old_pass'],$oldData->password )) {
            return response()->json([
                'status' => false,
            ]);
        }
        if($newData['name']==null)
        {
            $newData['name']=$oldData->name ;
        }
        if($newData['phone'] == null)
        {
            $newData['phone']=$oldData->phone ;

        }
        if($newData['address'] == null)
        {
            $newData['address']=Auth()->user()->addresses->first()->name;
        }
        $newData['email'] = Auth()->user()->email ;
        $newData['gateway_customer_id']=Auth()->user()->gateway_customer_id ;
        $newData['password']=$oldData->password ;
        $updated = Auth()->user()->update($newData);
        return  response()->json(['status'=>true]);


    }
    public function changePassword(Request $request)
    {

        $newData = $request->all();
        $oldData = Auth()->user();
       // dd(!Hash::check($newData['old_password']));
        //dd( $newData['new_password'] != $newData['confirm_password']);
        if(!Hash::check($newData['old_password'],$oldData->password )|| $newData['new_password'] != $newData['confirm_password']) {
            return response()->json([
                'status' => false,
            ]);
        }
        $newData['name']=$oldData->name ;
        $newData['address']=Auth()->user()->addresses->first()->name;
        $newData['phone']=$oldData->phone ;
        $newData['email']=$oldData->email ;
        $newData['gateway_customer_id']=Auth()->user()->gateway_customer_id ;
        $newData['password']=Hash::make($newData['new_password']);


        $updated = Auth()->user()->update($newData);
        return  response()->json(['status'=>true]);



    }
}
