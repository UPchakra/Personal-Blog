<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Str;
class TagController extends Controller
{
    public function addtag(Request $request){
    	$tags=Tag::all();
    	if($request->isMethod('post')){
    		$data= $request->all();
    		$tags=new Tag;
    		$tags->name=$data['name'];
			$tags->slug=str_slug($data['name']);
    		
            $tags->save();
            return redirect()->back()->with('flash_message','Tags Add Successfully');
    	}
    	return view('admin.tag.add',compact('tags'));
    }

    public function edittag(Request $request,$id){
    	$tags=Tag::findorfail($id);
    	if($request->isMethod('post')){
    		$data= $request->all();
    		$tags->name=$data['name'];
			$tags->slug=str_slug($data['name']);
    		
            $tags->save();
            return redirect()->route('addtag')->with('flash_message','Tags Edit Successfully');
    	}
    	return view('admin.tag.edit',compact('tags'));

    }
    public function deletetag($id){
    	$tags=Tag::findorfail($id);
	      $tags  ->delete();
	return redirect()->back()->with('flash_message','Tags Deleted Successfully');
}
}
