<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Image;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
        $profile = Admin::find(2);
        return view('admin.profile',compact('profile'));
    }
    public function AdminProfileEdit(){
        $edit_profile = Admin::find(2);
        return view('admin.admin_edit',compact('edit_profile'));
    }
    public function AdminProfileUpdate(Request $request){
        $update_data = Admin::find(2);
        $image = $request->file('photo');
        $unique = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $unique.'.'.$img_ext;
        $location = 'images/profile/';
        $image->move($location,$img_name);
        $last_img = $location.$img_name;

        @unlink(public_path($update_data->profile_photo_path));

        $update_data->name = $request->name;
        $update_data->email = $request->email;
        $update_data->profile_photo_path = $last_img;
        $update_data->update();
        $notification = array(
            'message' => 'profile updated successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }
    public function AdminPasswordChange(){
        return view('admin.passward_change');
    }
    public function AdminPasswordUpdate(Request $request){
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hash_pass = Admin::find(2)->password;
        if (password_verify($request->old_password,$hash_pass)){
            $pass_data = Admin::find(2);
            $pass_data->password = password_hash($request->password,PASSWORD_DEFAULT);
            $pass_data->update();

        }
        $notification = array(
            'message' => 'password change successful',
            'alert_type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
//    for user

    public function allUser(){
        $all_user = User::latest()->get();
        return view('admin.user.all_user',compact('all_user'));
    }















}
