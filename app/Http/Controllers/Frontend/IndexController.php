<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function homePage(){
        return view('frontend.index');
    }
    public function loginPage(){
        return view('frontend.login');
    }
    public function userProfile(){
        $id = Auth::user()->id;
        $user = User::find($id)->first();
        return view('frontend.user.index',compact('user'));
    }
    public function userProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        if($request->file('profile_photo_path')){
            $image = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_img/'. $data->profile_photo_path));
            $img_name = date('YmdHi').$image->getClientOriginalName();
            $image->move(public_path('upload/user_img'), $img_name);
            
            $data['profile_photo_path'] = $img_name;
            
        }
        $data->save();
        return redirect()->route('dashboard');
       
    }
    public function userlogout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function userChangePass(){

        return view('frontend.user.change_pass');
    }
    public function userPassStore(Request $request){
        $id = Auth::id();
       
        $hash_pass = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hash_pass)){
            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }else{
            return view('frontend.user.change_pass');
        }

        
    }
}
