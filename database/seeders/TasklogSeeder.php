<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tasklog;


class TasklogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //開始日を６ヶ月前にする
		$start = strtotime("-6 month");
		//作成する日数（180日分）
		$days = 365;
		//初期体重(50.0kg)

    	$completion = 0.5;
		for($i = 0; $i < $days; $i++){
			//作成する日
			$date = $start + $i * 24 * 60 * 60;
			//体重をランダムで作成する
			//-200g〜200gで増減するようにする
			$completion += 0.1 * (1 - rand(0, 2));
			
			//保存実行
			$log = new Tasklog();
			$log->date_key = date("Ymd", $date);
			$log->completion = $completion;
			$log->save();
    }
   }
    
  
    
}
