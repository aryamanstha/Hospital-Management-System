<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class AuthController extends Controller
{
    public function verify()
    {
        if(Auth::id()){
            if(Auth::user()->user_type=="0"){
                $doctors=Doctor::all();
                return view('user.home',compact('doctors'));
            }
            else{
                return redirect('/admin-dashboard');
            }
        }
        else
        return redirect()->back();
    }
}
