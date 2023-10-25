<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Tasklog;
use App\Models\Post;
use App\Models\Completion;



class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Completion $completion , Item $item )
    {
       
        $completion=Completion::latest('id')->get();
        return view('items/index', compact('completion'));
        return view('item.index')->with('completions', $completion);
    }

    
}
