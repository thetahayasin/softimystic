<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class CategoryTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\CategoryTranslation::factory(10)->create();
    }
}
