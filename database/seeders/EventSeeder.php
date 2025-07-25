<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            DB::table('events')->insert([
                'id' => Str::uuid(),
                'title' => $faker->sentence(3) . ' Voting Event',
                'description' => $faker->paragraph(3),
                'start_time' => Carbon::parse('2025-08-01 00:00:00'),
                'end_time' => Carbon::parse('2025-08-02 23:59:59'),
                'is_active' => $faker->boolean(80),
                'visibility' => $faker->boolean(90),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
