<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    public function managePost()
    {
        $allposts = Post::where('user_id', '=', Auth::user()->id)->get();
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
}
