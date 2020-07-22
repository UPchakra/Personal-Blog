<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use App\Category;
class CategoryController extends Controller
{
  public function addcat(Request $request){
  		$categories=Category::all();
    	if($request->isMethod('post')){

    
    		$data= $request->all();
            // dd($request);
    		$categories=new Category;
    		$categories->name=$data['name'];
			$categories->slug=str_slug($data['name']);

              $random = str_random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random.'.'.$extension;
                $image_path = 'public/uploads/categories/'. $filename;
                // Resize Image Code
                Image::make($image_tmp)->resize(400,250)->save($image_path);
                    // Store image name in products table
                    $categories->image = $filename;
                }
         
           }
    		
            $categories->save();
            return redirect()->back()->with('flash_message','Category Add Successfully');
    	}
    	return view('admin.category.add',compact('categories'));
    }

    public function editcat(Request $request,$id){
    	$categories=Category::findorfail($id);
    	if($request->isMethod('post')){
    		$data= $request->all();
    		$categories->name=$data['name'];
			$categories->slug=str_slug($data['name']);

			if($request->hasFile('image')){
				$image_tmp=$request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $image_path = 'public/uploads/category/'. $filename;
                    // Resize Image Code
                    Image::make($image_tmp)->save($image_path);
                    // Store image name in products table
                    $categories->image = $filename;
                }
            }

    		
            $categories->save();

             $image_path = 'public/uploads/category/';


            if(!empty($data['image'])){
                if(file_exists($image_path.$categories->image)){
                    unlink($image_path.$data['current_image']);
                }
            }
            return redirect()->route('addcat')->with('flash_message','Category Updated Successfully');
    	}
    	return view('admin.category.edit',compact('categories'));

    }
    public function deletecat($id){
    	$categories=Category::findorfail($id);
	      $categories  ->delete();
	return redirect()->back()->with('flash_message','Category Deleted Successfully');
}
}
