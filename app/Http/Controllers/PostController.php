<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tasklog;
use App\Models\Completion;

 
 class PostController extends Controller
 {
    public function index(Post $post)
    {
        $log_list = TaskLog::where("date_key","like",date("Y") . "%")->get();
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit(1), "log_list" => $log_list]);
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
    
    public function limit(Post $post)
    {
        return view('posts.limit')->with(['post'=>$post]);
    }
    
    public function store(Request $request, Post $post)
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
      
	public function dashboard(Post $post)
	{
	    //dd($post->get());
	    $log_list = TaskLog::where("date_key","like",date("Y") . "%")->get();
	    $task= Tasklog::all();
	    return view('dashboard')->with(['posts'=>$post->get() ,'task'=>$task ,"log_list" => $log_list]);
	}
    public function completion(Completion $completion, Post $post)
    {
        $input = array('title'=>$post->title,'body'=>$post->body,'limit'=>$post->limit, 'category_id'=>$post->category_id);
        $completion->fill($input)->save();
        //$post->delete();
        return redirect('/');
    }

	
	
	
}
