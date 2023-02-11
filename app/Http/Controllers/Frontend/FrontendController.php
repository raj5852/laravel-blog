<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index()
    {
        $categories = Category::where('status',0)->get();
        $posts = Post::where('status',0)->orderBy('created_at','desc')->get()->take(10);
        return view('frontend.index',compact('categories','posts'));
    }
    function viewCategoryPost($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->where('status', 0)->first();

        if ($category) {
            $posts = $category->posts()->select('name', 'slug', 'created_at')->paginate(10);

            return view('frontend.post.index', compact('category', 'posts'));
        } else {
            return redirect('/');
        }
    }
    function viewPost($categorySlug, $postSlug)
    {


        $category = Category::where('slug', $categorySlug)->where('status', 0)->first();

        if ($category) {

            $categoryPost = $category->load(['posts' => function ($query)  use ($postSlug) {
                return $query->where('slug', $postSlug)->first();
            }]);


             $latestPosts = Post::where('category_id',$category->id)->where('status',0)->orderBy('created_at','DESC')->take(15)->get();

             $postId = $categoryPost->posts[0]->id;
             $comments = Comment::where('post_id',$postId)->get();

            if ($categoryPost) {
                return view('frontend.post.view', compact('categoryPost','latestPosts','comments'));
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }
}
