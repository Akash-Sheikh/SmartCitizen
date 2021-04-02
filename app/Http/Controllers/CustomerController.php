<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Auth;
use Session;

use App\User;
use App\Rider;
use App\Vendor;
use App\Customer;
use App\Admin;

use App\ShopCategories;
use App\Shop;
use App\ProductCategories; 
use App\Product;

use File;
use DB;

class CustomerController extends Controller
{
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
 
//All Restaurants
public function restaurantsGet()
{
    if(Session::get('user_value')){
        $shop_categories = ShopCategories::all();
        $shops = Shop::all();
        return view('restaurants',compact('shops','shop_categories'));
    }
    return redirect()->route('login');     
}     
    
}
