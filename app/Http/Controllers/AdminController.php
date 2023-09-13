<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.home');
    }
    // --------------------Doctor-----------------------------
    public function viewDoctor()
    {
        $doctors = Doctor::all();
        return view('admin.Doctor.view', compact('doctors'));
    }
    public function addDoctor(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'position' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'profile' => 'required',
            ]
        );
        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->position = $request->position;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;

        $fileName = time() . '.' . $request->profile->extension();
        Storage::delete('public/images' . $doctor->profile);
        $request->profile->storeAs('public/images', $fileName);
        $doctor->profile = $fileName;
        $doctor->save();
        return redirect()->back()->with('message', 'Doctor Added Successfully');
    }

    public function editDoctor(Request $request)
    {
        $doctor = Doctor::find($request->id);
        if ($doctor != null) {
            $doctor->name = $request->name;
            $doctor->position = $request->position;
            $doctor->email = $request->email;
            $doctor->phone = $request->phone;
            if ($request->profile) {
                Storage::delete('public/images/' . $doctor->profile);
                $fileName = time() . '.' . $request->profile->extension();
                $request->profile->storeAs('public/images', $fileName);
                $doctor->profile = $fileName;
            }
            $doctor->save();
        }
        return redirect()->back()->with('message', 'Data edited Successfully');
    }
    public function deleteDoctor($id)
    {
        $doctor = Doctor::find($id);
        if ($doctor != null) {
            Storage::delete('public/images/' . $doctor->profile);
            $doctor->delete();
        }
        return redirect()->back()->with('message', 'Doctor Deleted Successfully');
    }

    //--------------------------Appointments-----------------------------------
    public function viewAppointment()
    {
        $appointments = Appointment::all();
        return view('admin.appointment', compact('appointments'));
    }

    public function approveAppointment($id)
    {
        $appointments = Appointment::find($id);
        $appointments->status = "Accepted";
        $appointments->save();
        return redirect()->back()->with('message', 'Appointment Accepted');
    }
    public function rejectAppointment($id)
    {
        $appointments = Appointment::find($id);
        $appointments->status = "Rejected";
        $appointments->save();
        return redirect()->back()->with('message', 'Appointment Rejected');
    }
}
