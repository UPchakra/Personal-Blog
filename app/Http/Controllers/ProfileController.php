<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Auth;

class ProfileController extends Controller
{
    public function profile(){
    	$user=Auth::User();
    return view('admin.profile.profile',compact('user'));
    }

    public function updateprofile(Request $request, $id){

    	 $data = $request->all();
        $user = User::findOrFail($id);
        $user->name = $data['name'];
        $user->about = $data['about'];

        $user->email =$data['email'];

        $random = str_random(20);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random.'.'.$extension;
                $image_path = 'public/uploads/profile/'. $filename;
                // Resize Image Code
                Image::make($image_tmp)->save($image_path);
                // Store image name in products table
                $user->image = $filename;
            }
        }

        $user->save();

    	return redirect()->back()->with('flash_message', 'Your Profile Has Been Successfully Updated');
    }

     public function updatePassword(){
        return view ('admin.profile.change_password');
    }

    // Checking User Current Password
    public function chkUserPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_password'];
        $user_id = Auth::guard('web')->user()->id;
        $check_password = User::where('id', $user_id)->first();
        if (Hash::check($current_password, $check_password->password)){
            return "true"; die;
        }else{
            return "false"; die;
        }
    }

    // Updating Password
    public function updateAdminPassword(Request $request,$id){
        $data = $request->all();
        $old_password = User::where('id', auth()->id())->first();
        $current_password = $data['current_password'];
        if(Hash::check($current_password, $old_password->password)){
            $new_pwd = bcrypt($data['pass_confirmation']);

            User::where('id', Auth::user()->id)->update(['password' => $new_pwd]);

            $email = auth()->user()->email;
            $messageData = [
                'email' => $email,
                'name' => auth()->user()->name,
                'updated_password' => $data['pass_confirmation'],
            ];
            Mail::send('emails.update_pass', $messageData, function ($message) use ($email){
                $message->to($email)->subject('Green-E-commerce Password Update');
            });


            return redirect()->back()->with('flash_message', 'Password Has Been Updated Successfully');


        } else {
            return redirect()->back()->with('flash_error', 'Old Password does not match with our database');
        }
    }

}
