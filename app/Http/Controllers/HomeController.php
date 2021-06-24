<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
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
            'alert-type' => 'success'
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
                'alert_type' => 'danger'
            );
            return redirect()->route('user.profile')->with($notification);
        }


    }
}
