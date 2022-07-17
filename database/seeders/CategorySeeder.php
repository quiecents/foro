<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title' => 'Television',
                'slug' => 'television',
                'key' => 'tv',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Photos',
                'slug' => 'photos',
                'key' => 'p',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Spain',
                'slug' => 'spain',
                'key' => 'e',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Random',
                'slug' => 'random',
                'key' => 'b',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Opinion',
                'slug' => 'opinion',
                'key' => 'pol',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Music',
                'slug' => 'music',
                'ket' => 'mu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'series',
                'slug' => 'series',
                'key' => 's',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
