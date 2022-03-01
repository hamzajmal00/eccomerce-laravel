<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminProfileController extends Controller
{
    public function profileView(){
        // $id = Auth::admin()->id;
        $admin = Admin::find(1);
        return view('admin.profile.index',compact('admin'));
    }
    public function profileEdit(){
        // $id = Auth::admin()->id;
        $admin = Admin::find(1);
        return view('admin.profile.edit',compact('admin'));
    }

    public function profileUpdate(Request $request){
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;
        if($request->file('admin_img')){
            $image = $request->file('admin_img');
            @unlink(public_path('upload/admin_img/'. $data->profile_photo_path));
            $img_name = date('YmdHi').$image->getClientOriginalName();
            $image->move(public_path('upload/admin_img'), $img_name);
            $last_img = public_path('upload/admin_img');
            $data['profile_photo_path'] = $img_name;
            
        }
        $data->save();
        return redirect()->route('admin.profile');
    }

    public function ChangePass(){
        return view('admin.profile.changepass');
    }
    public function storePass(Request $request){
        $HashPass = Admin::find(1)->password;
        if(Hash::check($request->curent_pass, $HashPass)){
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
            return redirect()->back();
        }
    }
}
