<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Auth;
use Image;
use App\Tag;


class PostController extends Controller
{
    public function addpost(Request $request){
    	$categories=Category::all();
    	$tags=Tag::all();

    	if($request->isMethod('post')){
    		$data=$request->all();
    		// dd($data);
    		$posts=new Post;
    		$posts->user_id=Auth::user()->id;
    		$posts->title=$data['title'];
    		$posts->body=$data['body'];
    		$posts->slug=str_slug($data['title']);

    		


    		
    		if(empty($data['status'])){
                $posts->status = 0;
            } else {
                $posts->status = 1;
            }

            
                $posts->Is_approved = 1;
           

            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $image_path = 'public/uploads/posts/'. $filename;
                    // Resize Image Code
                    Image::make($image_tmp)->save($image_path);
                    // Store image name in products table
                    $posts->image = $filename;
                }
            }
            $posts->save();
            $posts->categories()->attach($categories);
    		$posts->tags()->attach($tags);
            return redirect()->route('viewpost')->with('flash_message','Post Add Successfully');

    	}
    	return view('admin.post.add',compact('categories','tags'));
    }

    public function viewpost(){
    	$posts =Post::all();
    	return view('admin.post.view',compact('posts'));

    }
     public function deletepost($id){
    	$posts=Post::findorfail($id);
	      $posts->delete();
	return redirect()->back()->with('flash_message','Post Deleted Successfully');
}

public function showpost($id){
	$posts=Post::FIndorfail($id);
    // dd($posts);
	return view('admin.post.show',compact('posts'));
}

public function pending(){
    $posts=Post::where(['Is_approved'=>0])->get();
    return view('admin.post.pending',compact('posts'));
}
public function approve($id){
    $posts = Post::findorfail($id);
        if ($posts->is_approved == 0)
        {
            $posts->is_approved = 1;
            $posts->save();

            return redirect()->route('viewpost')->with('flash_message','Post Successfully Approved');

        }else{
            return redirect()->back()->with('flash_message',' This Post Is Already  Approved');


        }
        return redirect()->back();

}
}
