<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctors;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }



     public function upload(Request $request)
    {
        //getting doctor data
        $doctor = new doctor;

        //getting the doctors images
        $image = $request->file;

        $imagename = time().'.'.$image->getClientoriginalExtension();
        $request->file->move('doctorimage' ,$imagename);
        $doctor->image = $imagename;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room= $request->room;
        $doctor->speciality = $request->speciality;

        $doctor->save();


        return redirect()->back()->with('message','Doctor has been added successfully');
    }
}
