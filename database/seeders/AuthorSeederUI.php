<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeederUI extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [
            ['name' => 'J.K. Rowling', 'email' => 'jk.rowling@example.com'],
            ['name' => 'Stephen King', 'email' => 'stephen.king@example.com'],
            ['name' => 'George Orwell', 'email' => 'george.orwell@example.com'],
        ];

        foreach ($list as $row) {
            DB::table('authors')->insert(array_merge($row, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

    }
}
