<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tasklog;
use App\Models\Completion;
use Carbon\Carbon;
use Cloudinary;

 
 class PostController extends Controller
 {
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit(1)]);
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['image_url' => $image_url]; 
        dd($image_url);
        
        
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post'=>$post]);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' =>$post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function create(Category $category)
    {
        return view('posts.create')->with(['categories' => $category->get()]);
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
      
	public function dashboard(Post $post,Request $request)
	{
	    $task= Tasklog::all();
	    return view('dashboard')->with(['posts'=>$post->get() ,'task'=>$task]);
	}
	
    public function completion(Post $post)
    {
        $post->update(['is_done' => true, 'finished_at' => now()]);
        return view('posts.completion');
        
    }
	
}
