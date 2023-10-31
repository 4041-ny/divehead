<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime; // 追加

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'title' => '命名の心得',
                'body' => '命名はデータを基準に考える',
                'limit' => '2023年 10月18日',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'category_id' => 1,
            ]
        ]);
    }
}
