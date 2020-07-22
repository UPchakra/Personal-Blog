<?php

namespace App\Http\Controllers;
use App\Subscriber;
use Illuminate\Http\Request;
use Auth;

class SubscriberController extends Controller
{
    public function addsubs(Request $request){

    	 if($request->isMethod('post')){
            $data = $request->all();

            $subscriberCount = Subscriber::where('email', $data['email'])->count();
            if($subscriberCount > 0){
                return redirect()->back()->with('flash_error', ' Email Already subscriber in our Database');
            }
                            // Add Newsletter email in newsletter subscriber table
                $subscriber = new Subscriber;
                $subscriber->email = $data['email'];
                $subscriber->save();
                return redirect()->back()->with('flash_message',' Subscribed Successfully ');
            }
        }
   

     public function viewsubscriber(){
        $subscriber = Subscriber::get();
        return view ('admin.subscriber.view', compact('subscriber'));
    }


    public function deletesubscriber($id){
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();
        return redirect()->back()->with('flash_message', 'subscriber has been Deleted');

    }

    public function viewfav(){
        $posts=Auth::user()->favorite_posts;
        return view('admin.favorite.add',compact('posts'));
    }
public function deletefav($id){
        $posts = Auth::User()->findOrFail($id);
        $posts->delete();
        return redirect()->back()->with('flash_message', 'Favorite has been Deleted');

    }
}
