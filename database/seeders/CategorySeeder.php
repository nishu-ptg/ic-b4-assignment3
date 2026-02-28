<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $faker = fake();
//
//        foreach (range(1, 10) as $i) {
//            DB::table('categories')->insert([
//                'name' => ucfirst($faker->unique()->word),
//                'created_at' => now(),
//                'updated_at' => now(),
//            ]);
//        }

        // since faker words are looking weird for book categories
        $categories = ['Novel', 'Mystery', 'Sci-Fi', 'Religion', 'Bio'];
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
