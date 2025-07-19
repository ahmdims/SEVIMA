<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CandidateSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $event = DB::table('events')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {

            DB::table('candidates')->insert([
                'id' => Str::uuid(),
                'event_id' => $event[array_rand($event)],
                'name' => $faker->name(),
                'description' => $faker->name(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
