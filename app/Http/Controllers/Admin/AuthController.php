<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('admin.login.index');
    }
    public function checkLogin(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('admin.category.index')->with('success','login successfully');
        }
        return redirect()->route('admin.login')->with('error','login faile');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login')->with('success','logout successfully');
    }

    public function profile(){
        return view('admin.login.profile');
    }
    public function update_profile(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ]);
        $data= [
            'name'=>$request->name,
        ];
        $user = Auth::user();
        if($request->password){
            $this->validate($request,[
                'password'=>'required|min:6|max:32',
                'confirm'=>'same:password',
            ]);
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        return redirect()->route('admin.profile')->with('success','update successfully');
    }
}
