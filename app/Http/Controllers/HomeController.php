<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $all_cat = Category::all();
        $sliders = Slider::where('status',1)->get();
        $products = Product::where('status',1)->latest()->get();
        $featured = Product::where('featured',1)->get();
        $hot_deals = Product::where('hot_deals',1)->where('product_discount_price','!=',NULL)->get();
        $special_offer = Product::where('special_offer',1)->get();
        $special_deals = Product::where('special_deals',1)->get();

        $skip_cat_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_cat_0->id)->get();
        $skip_brand_0 = Brand::skip(0)->first();
        $skip_brand_product_0 = Product::where('status',1)->where('brand_id',$skip_brand_0->id)->get();


        return view('frontend.index',compact('all_cat','sliders','products','featured','hot_deals','special_offer','special_deals','skip_cat_0','skip_product_0','skip_brand_0','skip_brand_product_0'));
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function profile(){
        $id = Auth::user()->id;
        $profile = User::find($id);
        return view('frontend.profile_update',compact('profile'));
    }
    public function profileUpdate(Request $request){
        $id = Auth::user()->id;
        $profile_update = User::find($id);
        if ($img = $request->file('photo')){

            $unique_name = hexdec(uniqid());
            $ex_name = strtolower($img->getClientOriginalExtension());
            $location = 'images/profile/';
            $image = $unique_name.'.'.$ex_name;
            $img->move(public_path('images/profile/'),$image);
            $last_image = $location.$image;
        }

        $profile_update->name = $request->name;
        $profile_update->email = $request->email;
        $profile_update->phone = $request->phone;
        $profile_update->profile_photo_path = $last_image;
        $profile_update->update();

        $notification = array(
            'message' => 'profile updated successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('user.profile')->with($notification);
    }
    public function ChangePassword(){
        $id = Auth::user()->id;
        $profile = User::find($id);
        return view('frontend.change_password',compact('profile'));
    }
    public function ChangePasswordUpdate(Request $request){
        $id = Auth::user()->id;

        $hash_pass = Auth::user()->password;
        if (password_verify($request->old_password,$hash_pass)){
            $change_password = User::find($id);
            $change_password->password = password_hash($request->password,PASSWORD_DEFAULT);
            $change_password->update();
            $notification = array(
                'message' => 'password updated successfully',
                'alert_type' => 'success'
            );
            return redirect()->route('user.profile')->with($notification);
        }else{
            $notification = array(
                'message' => 'password not changed',
                'alert_type' => 'success'
            );
            return redirect()->route('user.profile')->with($notification);
        }


    }
    public function ProductDetails($id){
        $products = Product::find($id);
        $multi = MultiImg::where('product_id',$id)->get();
        return view('frontend.product.product_details',compact('products','multi'));
    }
    public function TagwiseProduct($tag){
        $tag_wise = Product::where('status',1)->where('product_tags_eng',$tag)->orWhere('product_tags_ban',$tag)->paginate(6);
        $categories = Category::all();
        return view('frontend.product.tagwise_product',compact('tag_wise','categories'));
    }
    public function catWiseProduct($id){
        $cat_wise = Product::where('status',1)->where('subcategory_id',$id)->paginate(6);
        $categories = Category::all();
        return view('frontend.product.categoryWise_product',compact('cat_wise','categories'));
    }

}
