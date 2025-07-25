<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $eventIds = DB::table('events')->pluck('id')->toArray();

        foreach ($eventIds as $eventId) {
            for ($i = 0; $i < 3; $i++) {
                DB::table('candidates')->insert([
                    'id' => Str::uuid(),
                    'event_id' => $eventId,
                    'name' => $faker->name(),
                    'description' => $faker->sentence(15, true) . ". Mewujudkan organisasi mahasiswa yang aktif, inklusif, dan progresif sebagai wadah pengembangan potensi dan suara mahasiswa yang berdampak nyata di dalam dan luar kampus.",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            if ($faker->boolean(50)) {
                for ($i = 0; $i < $faker->numberBetween(1, 2); $i++) {
                    DB::table('candidates')->insert([
                        'id' => Str::uuid(),
                        'event_id' => $eventId,
                        'name' => $faker->name(),
                        'description' => $faker->sentence(15, true) . ". Mewujudkan organisasi mahasiswa yang aktif, inklusif, dan progresif sebagai wadah pengembangan potensi dan suara mahasiswa yang berdampak nyata di dalam dan luar kampus.",
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}