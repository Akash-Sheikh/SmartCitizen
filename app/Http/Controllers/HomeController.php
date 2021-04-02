<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Provider;
use App\Seeker;
use Session;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Session::get('provider_email')){
            $User = DB::table('users')->where('email', Session::get('provider_email'))->update(['provider' => 1]);
            $u_name = DB::table('users')->where('email', Session::get('provider_email'))->first();
            $provider = new Provider;
            $provider->email = Session::get('provider_email');
            $provider->name = $u_name->name;
            $provider->save();
            Session::put('provider_email', 0);                             
        } 
       
        
        if(Session::get('seeker_email')){
            $user = DB::table('users')->where('email', Session::get('seeker_email'))->first();
            $seeker = new Seeker;
            $seeker->email = Session::get('seeker_email');
            $seeker->name = $user->name;
            $seeker->save(); 
            Session::put('seeker_email', 0);                             
        }   


        if(Session::get('admin_value')){
            return view('admin/home');
        }

        if(Session::get('provider_value')){           
                return view('provider/home');
        }  

        if(Session::get('seeker_value')){
            return view('home');
        } 

        return redirect()->route('login');      

    }
 
    public function admin_index()
    {
        if(Session::get('admin_value')){
            return view('admin/home');
        }

        if(Session::get('provider_value')){           
                return view('provider/home');
        }  

        if(Session::get('seeker_value')){
            return view('home');
        } 

        return redirect()->route('login');      
    }
    
    public function provider_index()
    {
        if(Session::get('admin_value')){
            return view('admin/home');
        }

        if(Session::get('provider_value')){           
                return view('provider/home');
        }  

        if(Session::get('seeker_value')){
            return view('home');
        } 

        return redirect()->route('login');  
    } 
         

    public function welcome()
    {
        if(Session::get('admin_value')){
            return view('admin/home');
        }

        if(Session::get('provider_value')){           
                return view('provider/home');
        }  

        if(Session::get('seeker_value')){
            return view('home');
        } 
        
        return view('welcome');
    }    

  
}
