<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    function user(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    function comments(){
        return $this->hasMany(Comment::class,'post_id','id');
    }
}
