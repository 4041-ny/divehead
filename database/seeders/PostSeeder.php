<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('posts')->insert([
                'title' => '横浜へ行く',
                'body' => 'いい気分です',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'category_id' => 1 ,
                'image_url'=> 'header.jpg',
         ]);
                
            DB::table('posts')->insert([
                'title' => '掃除をする',
                'body' => '虫がいた',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'category_id' => 2 ,
                'image_url'=> 'header.jpg',
         ]);
        
		
    
    }
}
