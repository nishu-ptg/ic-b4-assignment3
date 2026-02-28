<?php

namespace Database\Seeders;

use Bezhanov\Faker\ProviderCollectionHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = fake();

        $categoryIds = DB::table('categories')->pluck('id');
        $authorIds = DB::table('authors')->pluck('id');

        $count = 30;
        $titles = $this->generateUniqueTitles($faker, $count);

//        foreach (range(1, 50) as $i) {
        foreach ($titles as $i => $title) {
            DB::table('books')->insert([
//                'title' => $faker->sentence(3),
                'title' => $title,
//                'isbn' => $faker->unique()->isbn13(),
                'isbn' => $faker->unique()->numerify('978-0-####-####-#'),
//                'category_id' => $faker->numberBetween(1, 10),
//                'author_id' => $faker->numberBetween(1, 20),
                'category_id' => $categoryIds->random(),
                'author_id' => $authorIds->random(),
//                'cover_image' => null,
//                'cover_image' => "https://picsum.photos/200/300?random={$i}",
                'cover_image' => $this->downloadCoverImage($i),
//                'description' => $faker->paragraph(),
                'description' => $faker->realTextBetween(100, 200),
                'published_at' => $faker->date(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function generateUniqueTitles(\Faker\Generator $faker, int $count): \Illuminate\Support\Collection
    {
        $titles = collect();

        while ($titles->count() < $count) {
            $text  = rtrim($faker->realTextBetween(50, 100), '.');
            $words = explode(' ', $text);
            $title = implode(' ', array_slice($words, 0, rand(3, 5)));

            if (!$titles->contains($title)) {
                $titles->push($title);
            }
        }

        return $titles;
    }

    private function downloadCoverImage(int $index): ?string
    {
        $directory = 'covers/fake';
        if (!Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->makeDirectory($directory);
        }

        $url = "https://picsum.photos/200/300?random={$index}";
        $imageContent = Http::get($url)->body();

//        $filename = "book_cover_{$index}_" . Str::random(5) . ".jpg";
        $filename = "book_cover_" . md5($imageContent) . ".jpg";
        $path = "{$directory}/{$filename}";

        Storage::disk('public')->put($path, $imageContent);

        echo "\t saving {$path} \n";
        return $path;
    }
}
