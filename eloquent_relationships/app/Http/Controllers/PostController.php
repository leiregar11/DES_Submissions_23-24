<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\Post;


class PostController extends Controller
{
    public function index(){

        $posts=Post::all();
        $users=User::all();
        return view("postsViews.addPost",["posts"=>$posts, "users"=>$users]);
    }
    public function create(Request $request)
    {
        // Post::create([
        //     'post' => $request->post,
        //     'user_id'=>$request->userId,
        // ]);
        $post= new Post();
        $post->post=$request->post;
        $post->user_id=$request->userId;
        $post->save();

        
        return redirect()->route('post');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->back();


    }
}
