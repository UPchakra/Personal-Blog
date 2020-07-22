<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use App\Tag;

use Session;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
    	$categories=Category::all();
    	$posts=Post::latest()->approved()->published()->take(6)->get();
    	return view('index',compact('categories','posts'));
    	
    }

    public function details($slug){
    	$posts=Post::where('slug' ,$slug)->approved()->published()->first();
    	$categories=Category::all();
    	$blogKey = 'blog_' . $posts->id;

        if (!Session::has($blogKey)) {
            $posts->increment('view_count');
            Session::put($blogKey,1);
        }

    	$randomposts=Post::approved()->published()->take(3)->inRandomOrder()->get();
    	return view('front.post',compact('posts','randomposts','categories'));
    }

    public function allpost(){
    	$categories=Category::all();

    	$posts=Post::latest()->approved()->published()->paginate(6);
    	return view ('front.allposts',compact('posts','categories'));
    }

    public function postbycategory($slug){
        $category=Category::where('slug' ,$slug)->first();
        $posts=$category->posts()->approved()->published()->get();

        return view('front.category',compact('category','posts'));


    }
    
     public function postbytag($slug){
        $tags=Tag::where('slug' ,$slug)->first();
        $posts=$tags->posts()->approved()->published()->get();

        return view('front.tag',compact('tags','posts'));


    }
   
}
