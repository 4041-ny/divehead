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
        $log_list = TaskLog::where("date_key","like",date("Y") . "%")->get();
        $item = Item::find($id);
        return view ('items/show' , ['item' => $item] )
        ("tasklog_graph",["log_list" => $log_list]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     
    public function create()
    {
        return view('items/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
    public function store(Request $request)
    {
        $item = new Item;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->save();
        return redirect('/items');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     *
    public function edit($id)
    {
        $item = Item::find($id);
        return view('items.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     
    public function update(Request $request, $id)
    {
        $item= Item::find($id);
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->save();
        return redirect('items/' .$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     
    public function destroy(Item $item)
    {
        $item =Item::find($id);
        $item->delete();
        return redirect('/items');
    }
      */
}
