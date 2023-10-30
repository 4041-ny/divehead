<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Tasklog;
use App\Models\Post;
use App\Models\Completion;
use Carbon\Carbon;



class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $labels = [];
        $completions = [];
        
        for($i = 0;$i < 4; $i++)  //必ず４件出力されるようにする
        {
            $span = 7*$i;
            $startDay = Carbon::today()->subDays($span);
            $finishDay = Carbon::create($startDay)->subDays(7);
            $count = $post->where('is_done',true)->whereDate('finished_at', '<=', $startDay)->whereDate('finished_at', '>=', $finishDay)->count();
            //dd($post->where('is_done',true)->whereDate('finished_at', '<=', $startDay)->get(), $startDay, $span, Carbon::today(), $finishDay);
            $week = 7;
            $completionPercent = $count/$week * 100;
            array_push($completions, $completionPercent);
            $label = ($i+1).'週間前';
            array_push($labels, $label);
        }
       
        return view('items.index')->with(['completions'=>$completions,'labels'=>$labels]);
    
        //1ヵ月の１週間単位で出力、where関数で抽出し、絶対値の７で割っています。
    }
    


}
