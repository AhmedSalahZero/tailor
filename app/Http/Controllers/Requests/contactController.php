<?php

namespace App\Http\Controllers\Requests;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Messages;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function index()
    {
        $contactInfo = Contact::first();


        return view('contact.index')->with('info' , $contactInfo);
    }
    public function store(Request $request)
    {
        Messages::create($request->all());
    }
}
