<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PocketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Fashion', 'Art', 'Trip'];

        foreach ($names as $name){
            DB::table('pockets')->insert([
                'name'=>$name,
                'created_at'=>Carbon::now(),
                'updated_at'=> Carbon::now(),
            ]);
        }
    }
}
