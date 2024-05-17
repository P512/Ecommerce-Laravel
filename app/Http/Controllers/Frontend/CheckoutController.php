<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        if(empty(auth()->user()->userDetail->phone)){
            return redirect('profile')->with('message','Please Complate Your Profile..');
        }
        return view("frontend.checkout.index");
    }
}
