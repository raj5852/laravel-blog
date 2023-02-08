<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    //
    function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.post.index',compact('posts'));
    }
    function create()
    {
        $categories = Category::where('status', 0)->get();
        return view('admin.post.create', compact('categories'));
    }
    function store(PostFormRequest $request)
    {
        $data = $request->validated();
        $post = Post::create([
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'slug' => Str::slug($data['slug']),
            'description' => $data['description'],
            'yt_iframe' => $data['yt_iframe'],
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keyword' => $data['meta_keyword'],
            'status' => $request->status == true ? '1':'0',
            'created_by'=>auth()->user()->id
        ]);

        return redirect('admin/posts')->with('message','Post Added Successfully');
    }
}
