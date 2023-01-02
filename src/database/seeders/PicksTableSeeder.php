<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PicksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([1,3] as $pick){
            DB::table('picks')->insert([
                'article_id' => 1,
                'title' => '都内にある美術館',
                'url' => 'hogehoge.world',
                'memo' => 'Hello New World',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);
        }
    }
}
