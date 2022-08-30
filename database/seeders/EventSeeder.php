<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('events')->insert([[ 
        'name' => '山本竜弥',
        'salon_id' => 1,
        'stylist_id' => 1,
        'user_id' => 1,
        'start_date' => '2022-09-01 11:00:00',
        'end_date' => '2022-09-01 12:00:00',
        'price' => 5000, 
        'max_people' => 1,
        'is_visible' => 1
      ]]);
    }
}
