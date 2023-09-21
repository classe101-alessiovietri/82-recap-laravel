<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Post;
use App\Models\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::truncate();

        for ($i = 0; $i < 30; $i++) {
            $title = substr(fake()->sentence(), 0, 255);
            $slug = str()->slug($title);
            $content = fake()->paragraph();

            $randomCategoryId = null;
            if (fake()->boolean()) {
                $randomCategoryId = Category::inRandomOrder()->first()->id;
            }

            Post::create([
                'title' => $title,
                'slug' => $slug,
                'content' => $content,
                'category_id' => $randomCategoryId
            ]);
        }
    }
}
