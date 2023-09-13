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
        $appointments = Appointment::all();
        return view('user.home', compact('doctors', 'appointments'));
    }
    public function appointment(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'date' => 'required',
            'doctor' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);
        $appointment = new Appointment();
        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->date = $request->date;
        $appointment->doctor = $request->doctor;
        $appointment->phone = $request->phone;
        $appointment->message = $request->message;
        if (Auth::id()) {
            $appointment->user_id = Auth::user()->id;
        }
        $appointment->save();
        return redirect()->back()->with('message', 'Appointment Request Sent');
    }
    public function viewAppointment()
    {
        if (Auth::id()) {
            $appointments = Appointment::where('user_id', Auth::user()->id)->get();
            return view('user.appointment-view', compact('appointments'));
        }
        return redirect('/login');
    }
    public function deleteAppointment($id){
        $appointment = Appointment::find($id);
        $appointment->delete();
        return redirect()->back()->with('message','Appointment Deleted');
    }

    // ------------------------Contact------------------------------------
    public function contact()
    {
        return view('contact.contact');
    }
}
