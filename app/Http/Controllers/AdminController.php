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

use App\plasma;
use App\appoinments;
use App\Patients;
use App\Doctor;
use File;
use DB;


class AdminController extends Controller
{

//Profile    
public function AdminProfile()
{
    $admin = DB::table('admins')->where('email', Auth::user()->email)->first();
    $user = DB::table('users')->where('email', Auth::user()->email)->first();
    $appo = appoinments::all();
    $plas = plasma::all();
    if($user){
        return view('admin/profile',compact('admin','user','appo','plas'));
    }
    
}  

//Change Password
public function changePassGet()
{
    $admin = DB::table('admins')->where('email', Auth::user()->email)->first();
    $user = DB::table('users')->where('email', Auth::user()->email)->first();
    $appo = appoinments::all();
    $plas = plasma::all();
    if($user){
        return view('admin/changepassword',compact('admin','user','appo','plas'));
    }   
}  

public function changePassPost(Request $request)
{
    $current_pass = $request->c_pass;
    $new_pass = Hash::make($request->n_pass);
    $admin = DB::table('users')->where('email', Auth::user()->email)->first();
    if($admin){
        $dbpass = $admin->password;
    }
    if(Hash::check($current_pass, $dbpass)){
        $user = DB::table('users')->where('email', Auth::user()->email)->update(['password' => $new_pass]);
        return redirect()->back()->withErrors([' Password changed ! ']);
    }
    return redirect()->back()->withErrors([' Current password credential ! ']);   
}  

public function AdminProfilePost(Request $request)
{       
        $email = $request->email;
        $admin = DB::table('admins')->where('email', $email)->update(['name' => $request->name,'age' => $request->age, 'address' => $request->address, 'phone' => $request->phone, 'gender' => $request->gender]);
        $user = DB::table('users')->where('email', $email)->update(['name' => $request->name]);
        return redirect()->route('admin.profile');                    
}

 //Profile pic     
 public function storeprofile(Request $request)
 {
     $admin = Admin::find($request->id);
     if($admin->profileimage){
         if(file_exists($admin->profileimage)){
             unlink($admin->profileimage);
         }
     }        
     $profile_image = $request->file('p_file');
     $profile_destination = 'adminImages/'.time().'.'.$profile_image->extension();
     $profile_image->move(public_path('adminImages'),$profile_destination);
     $admin->profileimage = $profile_destination;
     $admin->save();
     return redirect()->route('admin.profile');
 }

//Cover pic        
 public function storecover(Request $request)
 {
     $admin = Admin::find($request->id);
     if($admin->coverimage){
         if(file_exists($admin->coverimage)){
             unlink($admin->coverimage);
         }
     }        
     $cover_image = $request->file('c_file');
     $cover_destination = 'adminImages/'.time().'.'.$cover_image->extension();
     $cover_image->move(public_path('adminImages'),$cover_destination);
     $admin->coverimage = $cover_destination;
     $admin->save();
     return redirect()->route('admin.profile');
 } 

//Plasma
public function plasma()
{
    $admin = DB::table('admins')->where('email', Auth::user()->email)->first();
    $user = DB::table('users')->where('email', Auth::user()->email)->first();
    $plasma = plasma::all();
    $appo = appoinments::all();
    $plas = plasma::all();
    if($admin){
        return view('admin/plasma',compact('admin','user','plasma','appo','plas'));
    }   
}

//Update Plasma    
public function getPlasma($id)
{
    $plasma = DB::table('plasmas')->where('id', $id)->first();
    $patient = DB::table('patients')->where('email',$plasma->p_email)->first();   
    $admin = DB::table('admins')->where('email', Auth::user()->email)->first();
    $appo = appoinments::all();
    $plas = plasma::all();   
    if($plasma){
        return view('admin/updatePlasma',compact('plasma','patient','admin','appo','plas'));
    }        
} 

public function postPlasma(Request $request)
{       
      $plasma = plasma::find($request->p_id); 
      $plasma->at = $request->time;
      $plasma->hospital = $request->hospital;
      $plasma->status = $request->status;
      $plasma->save();
      return redirect()->route('admin.plasma');                        
} 

//Appoinments
public function appoinments()
{
    $admin = DB::table('admins')->where('email', Auth::user()->email)->first(); 
    $appoin = appoinments::all();
    $appo = appoinments::all();
    $plas = plasma::all();
    if($admin){
        return view('admin/appoinments',compact('admin','appoin','appo','plas'));
    }   
}

//Patients
public function patients()
{
    $admin = DB::table('admins')->where('email', Auth::user()->email)->first(); 
    $patient = Patients::all();
    $appo = appoinments::all();
    $plas = plasma::all();
    if($admin){
        return view('admin/patients',compact('admin','patient','appo','plas'));
    }   
}

//Doctor
public function doctors()
{
    $admin = DB::table('admins')->where('email', Auth::user()->email)->first(); 
    $doctor = Doctor::all();
    $appo = appoinments::all();
    $plas = plasma::all();
    if($admin){
        return view('admin/doctors',compact('admin','doctor','appo','plas'));
    }   
}


////////////////////
//For DokanBari
////////////////////



//Shop Categories
public function shopCategoriesGet()
{
    if(Session::get('admin_value')){
        $shop_categories = ShopCategories::all();
        return view('admin/shopCategories',compact('shop_categories'));
    }
    return redirect()->route('login');     
} 
//Add Shop Categories
public function addShopCategories(Request $request)
{
    if(Session::get('admin_value')){
        $shop_categories = new ShopCategories;
        $shop_categories->name= $request->s_name;
        $shop_categories->save();
        return redirect()->route('admin.shopCategoriesGet');
    }
    return redirect()->route('login');      
}
//Update Shop Categories
public function updateShopCategoriesGet($id)
{
    if(Session::get('admin_value')){
        $shop_categories = ShopCategories::find($id);
        return view('admin/updateShopCategories',compact('shop_categories'));
    }
    return redirect()->route('login');      
} 
public function updateShopCategoriesPost(Request $request)
{
    if(Session::get('admin_value')){
        $shop_categories = ShopCategories::find($request->s_id);
        $shop_categories->name= $request->s_name;
        $shop_categories->save();
        return redirect()->route('admin.shopCategoriesGet');
    }
    return redirect()->route('login');      
}
//Delate Shop Categories
public function delateShopCategories($id)
{
    if(Session::get('admin_value')){
        $shop_categories = ShopCategories::find($id);
        $shop_categories->delete();
        return redirect()->route('admin.shopCategoriesGet');
    }
    return redirect()->route('login');      
}

//All Shops
public function shopsGet()
{
    if(Session::get('admin_value')){
        $shop_categories = ShopCategories::all();
        $shops = Shop::all();
        return view('admin/shops',compact('shops','shop_categories'));
    }
    return redirect()->route('login');     
} 
//Add Shops
public function addShops(Request $request)
{
    if(Session::get('admin_value')){
        $shops = new Shop;
        $shops->s_category= $request->shop_category;
        $shops->s_name= $request->s_name;
        $shops->s_vendor= $request->s_vendor;

        $shops->open_hh = $request->o_hour;
        $shops->open_mm= $request->o_min;

        $shops->close_hh= $request->c_hour;
        $shops->close_mm= $request->c_min;
       
        $Shop_banner = $request->file('s_banner');
        $banner_destination = 'shopImages/'.time().'.'.$Shop_banner->extension();
        $Shop_banner->move(public_path('shopImages'),$banner_destination);
        $shops->s_banner = $banner_destination;

        $shops->s_discount = $request->s_discount;
        $shops->s_brance = $request->s_brance;
        $shops->s_status = $request->status;
        $shops->save();
        return redirect()->route('admin.shopsGet');
    }
    return redirect()->route('login');      
}
//Update Shops
public function updateShopsGet($id)
{
    if(Session::get('admin_value')){
        $shops = Shop::find($id);
        $shop_categories = ShopCategories::all();
        return view('admin/updateShops',compact('shops','shop_categories'));
    }
    return redirect()->route('login');      
} 
public function updateShopsPost(Request $request)
{
    if(Session::get('admin_value')){
        $shops = Shop::find($request->s_id);
        $shops->s_name = $request->s_name;
        $shops->s_category = $request->shop_category;
        $shops->open_hh = $request->o_hour;
        $shops->open_mm = $request->o_min;
        $shops->close_hh = $request->c_hour;
        $shops->close_mm = $request->c_min;
        $shops->shop = $request->shop;
        $shops->s_status = $request->status;

        if($request->file('s_banner')){
            if($shops->s_banner){
                if(file_exists($shops->s_banner)){
                    unlink($shops->s_banner);
                }
            } 
            $Shop_banner = $request->file('s_banner');
            $banner_destination = 'shopImages/'.time().'.'.$Shop_banner->extension();
            $Shop_banner->move(public_path('shopImages'),$banner_destination);
            $shops->s_banner = $banner_destination;
        }
        else{
            $shops->s_banner = $request->ss_banner; 
        }
        $shops->s_discount = $request->s_discount;
        $shops->s_brance = $request->s_brance;
        $shops->save();
        return redirect()->route('admin.shopsGet');
    }
    return redirect()->route('login');      
}
//Delate Shops
public function delateShops($id)
{
    if(Session::get('admin_value')){
        $shops = Shop::find($id);
        if($shops->s_banner){
            if(file_exists($shops->s_banner)){
                unlink($shops->s_banner);
            }
        } 
        $shops->delete();
        return redirect()->route('admin.shopsGet');
    }
    return redirect()->route('login');      
}





//Product Categories
public function productCategoriesGet()
{
    if(Session::get('admin_value')){
        $product_categories = ProductCategories::all();
        return view('admin/productCategories',compact('product_categories'));
    }
    return redirect()->route('login');      
}
//Add Product Categories
public function addProductCategories(Request $request)
{    
    if(Session::get('admin_value')){
        $product_categories = new ProductCategories;
        $product_categories->name= $request->p_name;
        $product_categories->save();
        return redirect()->route('admin.productCategoriesGet');
    }
    return redirect()->route('login');     
}
//Update Product Categories
public function updateProductCategoriesGet($id)
{
    if(Session::get('admin_value')){
        $product_categories = ProductCategories::find($id);
        return view('admin/updateProductCategories',compact('product_categories'));
    }
    return redirect()->route('login');      
} 
public function updateProductCategoriesPost(Request $request)
{
    if(Session::get('admin_value')){
        $product_categories = ProductCategories::find($request->p_id);
        $product_categories->name= $request->p_name;
        $product_categories->save();
        return redirect()->route('admin.productCategoriesGet');
    }
    return redirect()->route('login');      
}
//Delate Product Categories
public function delateProductCategories($id)
{
    if(Session::get('admin_value')){
        $product_categories = ProductCategories::find($id);
        $product_categories->delete();
        return redirect()->route('admin.productCategoriesGet');
    }
    return redirect()->route('login');    
}

//All Products
public function productsGet()
{
    if(Session::get('admin_value')){
        $product = Product::all();
        $product_category = ProductCategories::all();
        $shops = Shop::all();
        $shop_categories = ShopCategories::all();
        return view('admin/products',compact('product','product_category','shops','shop_categories'));
    }
    return redirect()->route('login');     
} 
//Add Products
public function addProducts(Request $request)
{
    if(Session::get('admin_value')){
        $product = new Product;
        $product->p_name= $request->p_name;
        $product->p_category= $request->p_category;
        $product->shop_id= $request->p_shop;
        $product->p_vendor= $request->p_vendor;
        $product->p_price= $request->p_price;
        $product->p_discount= $request->p_discount;
        $product->p_description= $request->p_description;
        $product->p_availability= $request->p_availability;
        $product->a_hh = $request->a_hh;
        $product->a_mm = $request->a_mm;
        $product->d_hh = $request->d_hh;
        $product->d_mm = $request->d_mm;
       
        $img_1 = $request->file('img_1');
        $img_1_destination = 'productImages/'.time().'.'.$img_1->extension();
        $img_1->move(public_path('productImages'),$img_1_destination);
        $product->p_img_1 = $img_1_destination;
        $product->p_status = $request->status;
        $product->save();
        return redirect()->route('admin.productsGet');
    }
    return redirect()->route('login');      
}
//Update Products
public function updateProductsGet($id)
{
    if(Session::get('admin_value')){
        $product = Product::find($id);
        $product_category = ProductCategories::all();
        $shops = Shop::all();
        return view('admin/updateProducts',compact('product','product_category','shops'));
    }
    return redirect()->route('login');      
} 
public function updateProductsPost(Request $request)
{
    if(Session::get('admin_value')){
        $product = Product::find($request->p_id);
        $product->p_name = $request->p_name;
        $product->p_category = $request->p_category;
        $product->shop_id = $request->p_shop;
        $product->p_price = $request->p_price;
        $product->p_discount = $request->p_discount;
        $product->p_description = $request->p_description;
        $product->p_availability = $request->p_availability;
        $product->a_hh = $request->a_hh;
        $product->a_mm = $request->a_mm;
        $product->d_hh = $request->d_hh;
        $product->d_mm = $request->d_mm;

        $product->product = $request->product;
        $product->p_status = $request->p_status;

        if($request->file('img_1')){
            if($product->p_img_1){
                if(file_exists($product->p_img_1)){
                    unlink($product->p_img_1);
                }
            } 
            $product_img_1 = $request->file('img_1');
            $img_1_destination = 'productImages/'.time().'.'.$product_img_1->extension();
            $product_img_1->move(public_path('productImages'),$img_1_destination);
            $product->p_img_1 = $img_1_destination;
        }
        else{
            $product->p_img_1 = $request->pp_img_1; 
        }

        $product->save();
        return redirect()->route('admin.productsGet');
    }
    return redirect()->route('login');      
}
//Delate Products
public function delateProducts($id)
{
    if(Session::get('admin_value')){
        $product = Product::find($id);
        if($product->p_img_1){
            if(file_exists($product->p_img_1)){
                unlink($product->p_img_1);
            }
        } 
        $product->delete();
        return redirect()->route('admin.productsGet');
    }
    return redirect()->route('login');      
}

 

}
