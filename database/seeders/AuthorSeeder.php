<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = fake();

        foreach (range(1, 20) as $i) {
            DB::table('authors')->insert([
//                'name' => $faker->firstName() . ' ' . $faker->lastName(),
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
//                'bio' => $faker->paragraph(),
                'bio' => $faker->realTextBetween(100, 200),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
