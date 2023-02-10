<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected  $guarded = [];

    function posts(){
        return $this->hasMany(Post::class)->where('status',0);
    }



}
