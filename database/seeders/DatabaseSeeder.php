<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Salon;
use App\Models\Stylist;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      Salon::factory(20)->create();
      Stylist::factory(20)->create();
      User::factory(20)->create();
      Event::factory(100)->create();


      $this->call([
        UserSeeder::class,
        EventSeeder::class,
        // Event_userSeeder::class,
        // ReservationSeeder::class
        ]);

        
    }
}
