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

class PatientController extends Controller
{

    //Appoinment For User
    public function appoinment($id)
    {

        if(Session::get('user_value')){
            $doctor = DB::table('doctors')->where('id', $id)->first();
            $user = DB::table('users')->where('email', Auth::user()->email)->first();
            return view('appoinment',compact('doctor','user'));
        } 

        return redirect()->route('login');   
    } 


    public function saveappoinment(Request $request)
    {
        $appoinment = new appoinments;
        $appoinment->p_email = $request->p_email;
        $appoinment->p_name = $request->p_name;
        $appoinment->d_email = $request->d_email;
        $appoinment->d_name = $request->d_name;
        $appoinment->d_phone = $request->d_phone;
        $appoinment->appoinment_letter = $request->appoinment_letter;
        $appoinment->prescription = $request->prescription;
        $appoinment->meetlink = $request->meetlink;
        $appoinment->status = $request->status;
        $appoinment->patient_helth = $request->patient_helth;                
        $appoinment->save();
        return redirect()->route('patient.appoinmentHistory');  
    }

    public function appoinmentHistory()
    {
        $appoin = appoinments::all();
        $user = DB::table('users')->where('email', Auth::user()->email)->first();
        return view('appoinmenthistory',compact('appoin','user'));
    }

    //Profile
    public function p_profileGet()
    {
        if(Session::get('user_value')){
            $user = DB::table('users')->where('email', Auth::user()->email)->first(); 
            $patient = DB::table('patients')->where('email', Auth::user()->email)->first();    
            if($user){
            return view('profile',compact('user','patient'));  
            }  
        }
        return redirect()->route('login');          
    }

    //Change Password
    public function changePassGet()
    {
        if(Session::get('user_value')){
            $patient = DB::table('patients')->where('email', Auth::user()->email)->first();  
            $user = DB::table('users')->where('email', Auth::user()->email)->first(); 
            if($user){
                return view('changepassword',compact('patient','user'));
            }   
        }        
    }  

    public function changePassPost(Request $request)
    {
        $current_pass = $request->c_pass;
        $new_pass = Hash::make($request->n_pass);
        $patient = DB::table('users')->where('email', Auth::user()->email)->first();
        if($patient){
            $dbpass = $patient->password;
        }
        if(Hash::check($current_pass, $dbpass)){
            $user = DB::table('users')->where('email', Auth::user()->email)->update(['password' => $new_pass]);
            return redirect()->back()->withErrors([' Password changed ! ']);
        }
        return redirect()->back()->withErrors([' Current password credential ! ']);   
    }      

    public function p_profilePost(Request $request)
    {       
            $email = $request->email;
            $patient = DB::table('patients')->where('email', $email)->update(['name' => $request->name, 'age' => $request->age, 'blood_group' => $request->blood_group, 'address' => $request->address, 'gender' => $request->gender, 'phone' => $request->phone]);
            $user = DB::table('users')->where('email', $email)->update(['name' => $request->name]);
            return redirect()->route('patient.profileGet');                    
    }


    //Plasma
    public function plasmaGet()
    {
        if(Session::get('user_value')){
            $doctor = DB::table('doctors')->where('email', Auth::user()->email)->first();
            $user = DB::table('users')->where('email', Auth::user()->email)->first(); 
            $plasma = plasma::all();    
            if($user){
            return view('plasmaDonation',compact('doctor','user','plasma'));  
            }  
        }
        return redirect()->route('login');          
    }

    public function plasmaPost(Request $request)
    {
        $plasma = new plasma;
        $plasma->p_email = $request->email;
        $plasma->p_name = $request->name;
        $plasma->covid = $request->covid;
        $plasma->letter = $request->letter;
        $plasma->at = $request->at;
        $plasma->hospital = $request->hospital;
        if($request->plasma){
            $plasma->plasma = $request->plasma; 
        }
        else{
            $plasma->plasma = $request->plasma;         
        }
        $plasma->status = $request->status;               
        $plasma->save();
        return redirect()->route('patient.plasmaGet');           
    }

    //About
    public function aboutGet()
    {

            return view('about');       
    
    } 
    
    //Contact
    public function contactGet()
    {
    
            return view('contact');  
     
    }    

}
