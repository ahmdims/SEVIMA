<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {

            DB::table('events')->insert([
                'id' => Str::uuid(),
                'title' => $faker->sentence(),
                'description' => $faker->paragraph(),
                'start_time' => now(),
                'end_time' => now(),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
