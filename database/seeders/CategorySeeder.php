<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
                'name' => 'Casual',
               
         ]);
         
        DB::table('categories')->insert([
                'name' => 'Business',
               
         ]);
         
        DB::table('categories')->insert([
                'name' => 'Mode',
               
         ]);
        
        DB::table('categories')->insert([
                'name' => 'Classic',
               
         ]);
         
        DB::table('categories')->insert([
                'name' => 'Street',
               
         ]);
        
        DB::table('categories')->insert([
                'name' => 'Others',
               
         ]);
    }
}
