<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeederUI extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [
            ['name' => 'Fiction', 'description' => 'Novels and stories'],
            ['name' => 'Science', 'description' => 'Scientific books and journals'],
            ['name' => 'History', 'description' => 'Historical books and documents'],
        ];

        foreach ($list as $row) {
            DB::table('categories')->insert(array_merge($row, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
