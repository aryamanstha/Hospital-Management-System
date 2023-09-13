<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            return redirect('user');
        }
        $doctors = Doctor::all();
        return view('user.home', compact('doctors'));
    }
    public function appointment(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'date'=>'required',
            'doctor'=>'required',
            'phone'=>'required',
            'message'=>'required',
        ]);
        $appointment=new Appointment();
        $appointment->name=$request->name;
        $appointment->email=$request->email;
        $appointment->date=$request->date;
        $appointment->doctor=$request->doctor;
        $appointment->phone=$request->phone;
        $appointment->message=$request->message;
        if(Auth::id()){
            $appointment->user_id=Auth::user()->id;
        }
        $appointment->save();
        return redirect()->back()->with('message','Appointment Request Sent');
    }
}
