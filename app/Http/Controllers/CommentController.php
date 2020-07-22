<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
class CommentController extends Controller
{
    public function comment(Request $request,$post){

    	$comment = new Comment();
        $comment->post_id = $post;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->save();
        
        return redirect()->back()->with('flash_message','Comment Successfully Published');

    }


    public function viewcomment(){
    	$comments=Comment::latest()->get();
    	return view('admin.comment.view',compact( 'comments'));
    }

     public function deletecomment($id){
        $comments = Comment::findOrFail($id);
        $comments->delete();
        return redirect()->back()->with('flash_message', 'comments has been Deleted');

    }
}
