<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Post;

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

            Post::create([
                'title' => $title,
                'slug' => $slug,
                'content' => $content,
            ]);
        }
    }
}
