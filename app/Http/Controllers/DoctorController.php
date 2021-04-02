<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Auth;
use Session;

use App\plasma;
use App\appoinments;
use App\User;
use App\Patients;
use App\Doctor;
use File;
use DB;




class DoctorController extends Controller
{

//Doctor Registration
    public function doctorRegistration()
    {
        return view('doctor/doctor-registration');
    }

//Profile    
    public function doctorProfile()
    {
        $doctor = DB::table('doctors')->where('email', Auth::user()->email)->first();
        $user = DB::table('users')->where('email', Auth::user()->email)->first();
        $appo = appoinments::all();
        if($doctor){
            return view('doctor/profile',compact('doctor','user','appo'));
        }
        
    }  

    public function storeDoctor(Request $request)
    {       
            $email = $request->email;
            $doctor = DB::table('doctors')->where('email', $email)->update(['name' => $request->name,'hospital' => $request->hospital, 'phone' => $request->phone, 'gender' => $request->gender, 'education' => $request->education, 'specialist' => $request->specialist]);
            $user = DB::table('users')->where('email', $email)->update(['name' => $request->name]);
            return redirect()->route('doctor.profile');                    
    }

//Change Password
public function changePassGet()
{
    $doctor = DB::table('doctors')->where('email', Auth::user()->email)->first();
    $user = DB::table('users')->where('email', Auth::user()->email)->first();
    $appo = appoinments::all();
    if($user){
        return view('doctor/changepassword',compact('doctor','user','appo'));
    }   
}  

public function changePassPost(Request $request)
{
    $current_pass = $request->c_pass;
    $new_pass = Hash::make($request->n_pass);
    $doctor = DB::table('users')->where('email', Auth::user()->email)->first();
    if($doctor){
        $dbpass = $doctor->password;
    }
    if(Hash::check($current_pass, $dbpass)){
        $user = DB::table('users')->where('email', Auth::user()->email)->update(['password' => $new_pass]);
        return redirect()->back()->withErrors([' Password changed ! ']);
    }
    return redirect()->back()->withErrors([' Current password credential ! ']);   
}  

//Appoinments   
public function doctorAppoinment()
{
    $doctor = DB::table('doctors')->where('email', Auth::user()->email)->first();
    $user = DB::table('users')->where('email', Auth::user()->email)->first();
    $appoin = appoinments::all();
    $appo = appoinments::all();
    if($doctor){
        return view('doctor/appoinments',compact('appoin','doctor','user','appo'));
    }
    
}       

//Update Appoinment    
    public function updateAppoinmentGet($id)
    {
        $doctor = DB::table('doctors')->where('email', Auth::user()->email)->first();
        $user = DB::table('users')->where('email', Auth::user()->email)->first();        
        $appoin = DB::table('appoinments')->where('id', $id)->first();
        $patient = DB::table('patients')->where('email', $appoin->p_email)->first();
        $user_c = DB::table('users')->where('email', $appoin->p_email)->first();
        $appo = appoinments::all();
        if($appoin){
            return view('doctor/updateAppoinment',compact('appoin','doctor','user','patient','user_c','appo'));
        }        
    } 
    
    public function updateAppoinmentPost(Request $request)
    {       
          $appoin = appoinments::find($request->a_id); 
          $appoin->prescription = $request->prescription;
          $appoin->visit_time = $request->visit;
          $appoin->meetlink = $request->meetlink;
          $appoin->patient_helth = $request->p_helth;
          $appoin->status = $request->status;
          $appoin->save();
          $user = DB::table('users')->where('email', $request->email)->update(['covid' => $request->covid]);
          return redirect()->route('doctor.doctorAppoinment');                        
    }    
   

 //Profile pic     
    public function storeprofile(Request $request)
    {
        $doctor = Doctor::find($request->id);
        if($doctor->profileimage){
            if(file_exists($doctor->profileimage)){
                unlink($doctor->profileimage);
            }
        }        
        $profile_image = $request->file('p_file');
        $profile_destination = 'doctorImages/'.time().'.'.$profile_image->extension();
        $profile_image->move(public_path('doctorImages'),$profile_destination);
        $doctor->profileimage = $profile_destination;
        $doctor->save();
        return redirect()->route('doctor.profile');
    }

 //Cover pic        
    public function storecover(Request $request)
    {
        $doctor = Doctor::find($request->id);
        if($doctor->coverimage){
            if(file_exists($doctor->coverimage)){
                unlink($doctor->coverimage);
            }
        }        
        $cover_image = $request->file('c_file');
        $cover_destination = 'doctorImages/'.time().'.'.$cover_image->extension();
        $cover_image->move(public_path('doctorImages'),$cover_destination);
        $doctor->coverimage = $cover_destination;
        $doctor->save();
        return redirect()->route('doctor.profile');
    } 

  /* 
    public function doctorLogCheck(Request $request)
    {
        $dbemail ="0";
        $dbpass = "0";
        $email = $request->email;
        $pass = $request->password;
        $doctor = DB::table('doctors')->where('email', $email)->first();
        if($doctor){
            $dbemail = $doctor->email;
            $dbpass = $doctor->password;
        }
        if(Hash::check($pass, $dbpass) && $email === $dbemail){
            return view('doctor/home',compact('doctor'));
        }
        $validator = Validator::make($request->all(), [ // <---
            'email' => 'same:$dbpass',        
        ],
        [
            'email.same'    => 'These credentials do not match our records.',
        ]    
        );
        if ($validator->fails()) {          
            return redirect('/doctor-login')->withErrors($validator)->withInput();            
        }
    }    

    public function Doctors()
    {
        $doctors = Doctor::all();
        return view('admin/doctors',compact('doctors'));
    } 
*/ 

/*
    public function profileDelete($id)
    {
        $doctor = Doctor::find($id);
        if($doctor->profileimage){
            if(file_exists($doctor->profileimage)){
                unlink($doctor->profileimage);
            }
        }
        $doctor->profileimage = "NULL";
        $doctor->save();
        return "Profile pic delate success!";
    } 
*/

/*
    public function coverDelete($id)
    {
        $doctor = Doctor::find($id);
        if($doctor->coverimage){
            if(file_exists($doctor->coverimage)){
                unlink($doctor->coverimage);
            }
        }
        $doctor->coverimage = "NULL";
        $doctor->save();
        return "Cover pic delate success!";
    }    
*/

}
