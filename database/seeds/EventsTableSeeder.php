<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 50; $i++) 
        { 
     		DB::table('events')->insert([
                'title' => Str::random(10),
                'start_date' => '2019-'.rand(0, 1).rand(0, 2).'-'.rand(1, 31),
            ]);
        }
    }
}
