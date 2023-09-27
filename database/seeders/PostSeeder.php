<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Post;
use App\Models\Category;

// Helpers
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Post::truncate();
        });

        Storage::deleteDirectory('uploads/images');
        Storage::makeDirectory('uploads/images');

        for ($i = 0; $i < 30; $i++) {
            $title = substr(fake()->sentence(), 0, 255);
            $slug = str()->slug($title);
            $content = fake()->paragraph();

            $randomCategoryId = null;
            if (fake()->boolean()) {
                $randomCategoryId = Category::inRandomOrder()->first()->id;
            }

            $coverImg = null;
            if (fake()->boolean()) {
                $coverImg = fake()->image(storage_path('app/public/uploads/images'), 360, 360, 'animals', false, true, 'cats', false, 'jpg');
                if ($coverImg != '') {
                    $coverImg = 'uploads/images/'.$coverImg;
                }
                else {
                    $coverImg = null;
                }
            }

            Post::create([
                'title' => $title,
                'slug' => $slug,
                'content' => $content,
                'category_id' => $randomCategoryId,
                'cover_img' => $coverImg
            ]);
        }
    }
}
