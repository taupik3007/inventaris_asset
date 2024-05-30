<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Origin;

class OriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Origin::create([
            'ori_code'  => 'INV.YYS',
            'ori_name'  => 'Yayasan'
        ],[
            'ori_code'  => 'INV.SMK',
            'ori_name'  => 'Sekolah'
        ],[
            'ori_code'  => 'INV.HBH',
            'ori_name'  => 'Hibah'
        ]);
    }
}
