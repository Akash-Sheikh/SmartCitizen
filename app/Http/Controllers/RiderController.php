<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiderController extends Controller
{
    //Rider Registration
    public function riderRegistration()
    {
        return view('rider/riderRegistration');
    }
}
