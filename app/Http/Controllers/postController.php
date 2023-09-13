<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class postController extends Controller
{
    public function displayAllPosts(){
        $posts = Post::with('user')
        ->where('isExist', 1)
        ->get();

        return view('components.post', compact('posts'));
    }

    public function displayMyPosts(){
        $userId = session()->get('user_id');

        $posts = Post::with('user')
        ->where('isExist', 1)
        ->where('author', $userId)
        ->get();

        return view('components.my-post', compact('posts'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function createPost(Request $request){
        $userId = $request->session()->get('user_id');

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->author = $userId;
        $post->isExist = 1;

        $post->save();

        return redirect('/post');
    }

    public function deletePostAdmin(Request $request){
        $post = Post::find($request->post_id);

        if (!$post) {
            return redirect('/post')->with('error', 'Post not found.');
        }

        $post->isExist = 0;

        $post->save();

        return redirect('/post')->with('success', 'Post deleted successfully.');
    }

    public function updatePostAdmin(Request $request){
        $post = Post::find($request->post_id);

        if (!$post) {
            return redirect('/post')->with('error', 'Post not found.');
        }

        $post->body = $request->body;

        $post->save();

        return redirect('/post')->with('success', 'Post updated successfully.');
    }

    public function deleteMyPost(Request $request){
        $post = Post::find($request->post_id);

        if (!$post) {
            return redirect('/my-post')->with('error', 'Post not found.');
        }

        $post->isExist = 0;

        $post->save();

        return view('components.my-post')->with('success', 'Post deleted successfully.');
    }

    public function updateMyPost(Request $request){
        $post = Post::find($request->post_id);

        if (!$post) {
            return redirect('/my-post')->with('error', 'Post not found.');
        }

        $post->body = $request->body;

        $post->save();

        return view('components.my-post')->with('success', 'Post updated successfully.');
    }
}
