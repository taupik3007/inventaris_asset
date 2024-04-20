<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'ctg_code'          => 'B',
            'ctg_original_code' => 'B',
            'ctg_name'          => 'Bangunan'
        ]);
    }
}
