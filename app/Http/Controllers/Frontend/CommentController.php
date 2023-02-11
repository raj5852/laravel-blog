<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    function store(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'comment_body'=>'required'
            ]);

            $post = Post::where('slug', $request->post_slug)->where('status', '0')->first();
            if ($post) {
                Comment::create([
                    'post_id'=>$post->id,
                    'user_id'=>auth()->user()->id,
                    'comment_body'=>$request->comment_body
                ]);
                return redirect()->back()->with('message', 'Commented successsfully!');

            } else {
                return redirect()->back()->with('message', 'No Search Post Found');
            }
        } else {
            return redirect('login')->with('message', 'Login first to comment');
        }
    }
    function commentdestroy($id){
        $comment = Comment::where('user_id',auth()->user()->id)->where('id',$id)->first();
        $comment->delete();
        return redirect()->back()->with('message','Comment Deleted Successfully');
    }
}
