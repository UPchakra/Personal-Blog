<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class FavoriteController extends Controller
{
    public function addfav($post){


    	$user=Auth::user();
    	$isfavorite=$user->favorite_posts()->where('post_id',$post)->count();

    	if($isfavorite==0){
            $user->favorite_posts()->attach($post);
                return redirect()->back()->with('flash_message_error','Post Successfully added to your favorite list ');

            return redirect()->back();
    	}else{
            $user->favorite_posts()->detach($post);
                return redirect()->back()->with('flash_message_error','Post Successfully removed from  your favorite list ');

            return redirect()->back();
            
    	}
    }
}
