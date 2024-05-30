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
        Category::create([
            'ctg_code'          => 'B.1',
            'ctg_original_code' => '1',
            'ctg_name'          => 'Lantai 1',
            'ctg_parent_id'   => '1'
        ]);
        Category::create([
            'ctg_code'          => 'B.2',
            'ctg_original_code' => '2',
            'ctg_name'          => 'Lantai 2',
            'ctg_parent_id'   => '1'
        ]);
        Category::create([
            'ctg_code'          => 'B.3',
            'ctg_original_code' => '3',
            'ctg_name'          => 'Lantai 3',
            'ctg_parent_id'   => '1'
        ]);
      
        Category::create([
            'ctg_code'          => 'P',
            'ctg_original_code' => 'P',
            'ctg_name'          => 'Barang',
        ]);
        Category::create([
            'ctg_code'          => 'P.1',
            'ctg_original_code' => '1',
            'ctg_name'          => 'Meja',
            'ctg_parent_id'   => '5'
        ]);
        Category::create([
            'ctg_code'          => 'P.2',
            'ctg_original_code' => '2',
            'ctg_name'          => 'Kursi',
            'ctg_parent_id'   => '5'
        ]);
        Category::create([
            'ctg_code'          => 'P.3',
            'ctg_original_code' => '3',
            'ctg_name'          => 'Lemari',
            'ctg_parent_id'   => '5'
        ]);
        Category::create([
            'ctg_code'          => 'P.4',
            'ctg_original_code' => '4',
            'ctg_name'          => 'Elektronik',
            'ctg_parent_id'   => '5'
        ]);
        Category::create([
            'ctg_code'          => 'P.4.1',
            'ctg_original_code' => '1',
            'ctg_name'          => 'Projektor',
            'ctg_parent_id'   => '9'
        ]);
        Category::create([
            'ctg_code'          => 'P.2.1',
            'ctg_original_code' => '1',
            'ctg_name'          => 'Kursi Siswa',
            'ctg_parent_id'   => '7'
        ]);
    }
}
