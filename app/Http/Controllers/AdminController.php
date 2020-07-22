<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function adminlogin(Request $request){
        if($request->isMethod('post')){
             $data= $request->input();
             if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
              Session::put('adminSession',$data['email']);
               return redirect()->route('dashboard');
             }else{
                return redirect()->route('adminlogin')->with('flash_message_error','Invalid Username or Password');

             }

        }
       
            return view ('admin.auth.login');

         }

    public function dashboard(){
        if(Session::has('adminSession')){

        }else{
            return redirect()->route('adminlogin')->with('flash_message_error','Please login to access');
    }
    return view('admin.dashboard');

    }
  public function logout(){
    Session::flush();
    return redirect()->route('index')->with('flash_message_error','Logout Successfully');
  }  
}
