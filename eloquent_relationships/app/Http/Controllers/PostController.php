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
        $subjects=Subject::all();
        return view("postsViews.addPost",["posts"=>$posts, "users"=>$users, 'subjects'=>$subjects]);
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
        
        if ($request->has('subjects')) {
            $subjects = is_array($request->subjects) ? $request->subjects : explode(',', $request->subjects);
            foreach ($subjects as $subject) {
                $post->subject()->attach($subject);
            }
        }

     
        
        
        return redirect()->route('post');
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('postsViews.editPost', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update([
            'post' => $request->post,
        ]);

        return redirect()->route('user');

    }

    public function show(){
        $posts= Post::latest('created_at')->limit(12)->get();
        return $posts;
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->back();


    }
}
