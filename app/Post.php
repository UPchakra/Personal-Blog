<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
    	return $this->belongsTo(User::class ); 
    }
    public function categories(){
    	return $this->belongsToMany(Category::class,'category_post'); 

    }
    public function tags(){
    	return $this->belongsToMany(Tag::class,'post_tag'); 
    }

    public function favorite_to_users(){
    	return $this->belongsToMany(User::class); 
    }
     public function comments(){
        return $this->hasMany(Comment::class); 
    }


    public function scopeApproved($query)
    {
        return $query->where('Is_approved',1); 
    }

    public function scopePublished($query)
    {
        return $query->where('status',1); 
    }



}

