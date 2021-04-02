<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderController extends Controller
{
       //Provider Registration
       public function providerRegistration()
       {
           return view('provider/providerRegistration');
       }
}
