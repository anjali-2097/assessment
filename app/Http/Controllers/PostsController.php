<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    public function managePost()
    {
        $allposts = Post::all();
        return view('posts.show',['posts'=>$allposts]);
    }

    public function createPost()
    {
        return view('posts.create');
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts',
            'description' => 'required'
        ]);
           
        $data = $request->all();
        $data['user_id']=Auth::user()->id;
        
        Post::create($data);

        return redirect('manage-post')->withSuccess('Post created successfully!');

    }

    public function viewPost($postid)
    {
        $post = Post::where('id', $postid)->first();
        
        $user = User::where('id', $post->user_id)->first();
        $post['username'] = $user->name;
        return view('posts.view',['post'=>$post]);
    }

    public function deletePost($postid)
    {
        Post::where('id', $postid)->firstorfail()->delete();
        return redirect()->to('manage-post'); 
    }

}
