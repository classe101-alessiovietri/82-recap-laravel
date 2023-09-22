<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Tag;

// Helpers
use Illuminate\Support\Facades\Schema;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Tag::truncate();
        });

        $tags = [
            'Bello',
            'Figo',
            'Gu',
            'Interessante',
            'Geniale',
            'Brutto'
        ];

        foreach ($tags as $title) {
            $slug = str()->slug($title);

            Tag::create([
                'title' => $title,
                'slug' => $slug
            ]);
        }
    }
}
