<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ArtCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_categories')->insert([
            'category_name' => 'Research',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('article_categories')->insert([
            'category_name' => 'News',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('article_categories')->insert([
            'category_name' => 'Events',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
