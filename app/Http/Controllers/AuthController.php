<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class AuthController extends Controller
{
    public function verify()
    {
        if(Auth::id()){
            if(Auth::user()->user_type=="0"){
                return view('user.home');
            }
            else{
                return view('admin.home');
            }
        }
        else
        return redirect()->back();
    }
}
