<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Category;

// Helpers
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Category::truncate();
        });

        for ($i = 0; $i < 10; $i++) {
            $title = substr(fake()->word(), 0, 255);
            $slug = str()->slug($title);

            Category::create([
                'title' => $title,
                'slug' => $slug
            ]);
        }
    }
}
