<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookSeederUI extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = DB::table('authors')->pluck('id', 'name');
        $categories = DB::table('categories')->pluck('id', 'name');

        $books = [
            [
                'title' => "Harry Potter and the Philosopher's Stone",
                'author' => "J.K. Rowling",
                'category' => "Fiction",
                'isbn' => "978-0-7475-3269-9",
                'status' => "Available",
                'image' => "https://fastly.picsum.photos/id/617/200/300.jpg?hmac=WVwPHGFiGQ3OhdyeRk0pQ82EUCJuksc-Zf7YjirDr9Q",
            ],
            [
                'title' => "The Shining",
                'author' => "Stephen King",
                'category' => "Fiction",
                'isbn' => "978-0-385-12167-5",
                'status' => "Available",
                'image' => "https://fastly.picsum.photos/id/319/200/300.jpg?hmac=-xZWQr-2igun1QhUD5zoRCQKvRl7bjB_gIbQuv26oj0",
            ],
            [
                'title' => "1984",
                'author' => "George Orwell",
                'category' => "Fiction",
                'isbn' => "978-0-452-28423-4",
                'status' => "Borrowed",
                'image' => "https://fastly.picsum.photos/id/1058/200/300.jpg?hmac=KdLDQtUUGPBshA5WQaD3nZMUtdgHS9zJJ3pfoXWdjUE",
            ],
        ];

        foreach ($books as $book) {
            $imagePath = $this->storeImageFromUrl($book['image']);

            DB::table('books')->insert([
                'title' => $book['title'],
                'author_id' => $authors[$book['author']] ?? null,
                'category_id' => $categories[$book['category']] ?? null,
                'isbn' => $book['isbn'],
                'status' => strtolower($book['status']),
                'cover_image' => $imagePath,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function storeImageFromUrl(string $url): ?string
    {
        $directory = 'covers/seed';
        if (!Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->makeDirectory($directory);
        }

        $imageContent = Http::get($url)->body();

//        $filename = Str::random(5) . '_' . basename(parse_url($url, PHP_URL_PATH));
        $filename = "book_cover_" . md5($imageContent) . ".jpg";
        $path = "{$directory}/{$filename}";

        Storage::disk('public')->put($path, $imageContent);

        echo "\t saving {$path} \n";
        return $path;
    }
}
