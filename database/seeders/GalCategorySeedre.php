<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GalCategorySeedre extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gallery_categories')->insert([
            'gallery_category_name' => 'Research',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('gallery_categories')->insert([
            'gallery_category_name' => 'Events',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
