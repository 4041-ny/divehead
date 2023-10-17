<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Tasklog;


class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view ('items/index' , ['items'=> $items] );
    }
    public function show($id , Request $request )
    {
        $item = Item::find($id);
        return view ('items/index' , ['item' => $item,]);
        
    
    }

    
}
