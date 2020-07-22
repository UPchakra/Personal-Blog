<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Auth;
use Image;
use App\Tag;
class AuthorController extends Controller
{
 public function viewauthor(){

 	$posts =Post::all();
    	return view('admin.author.view',compact('posts'));
 }

 public function addauthor(Request $request){
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

            
                $posts->Is_approved = 0;
           

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
            return redirect()->route('viewauthor')->with('flash_message','Post Add Successfully');

    	}
    	return view('admin.author.add',compact('categories','tags'));
    }

     public function deleteauthor($id){
    	$posts=Post::findorfail($id);
	      $posts->delete();
	return redirect()->back()->with('flash_message','Post Deleted Successfully');
}

public function showauthor($id){
	$posts=Post::FIndorfail($id);
	return view('admin.author.show',compact('posts'));
}



}
