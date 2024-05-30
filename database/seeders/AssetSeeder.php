<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asset;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Asset::create([
            'ass_category_id' => '11',
            'ass_origin_id'     => '1',
            'ass_year'          => '2021',
            'ass_registration_code' => '001/P.02.001/INV.YYS/2021',
            'ass_name' =>'kursi siswa ke 1',
            'ass_price' => '5000000',
            'ass_condition' => 1,
            'ass_status' => 1


        ]);
        Asset::create([
            'ass_category_id' => '11',
            'ass_origin_id'     => '1',
            'ass_year'          => '2021',
            'ass_registration_code' => '002/P.2.2/INV.YYS/2021',
            'ass_name' =>'kursi siswa ke 2',
            'ass_price' => '5000000',
            'ass_condition' => 1,
            'ass_status' => 1


        ]);
        Asset::create([
            'ass_category_id' => '11',
            'ass_origin_id'     => '1',
            'ass_year'          => '2021',
            'ass_registration_code' => '003/P.2.3/INV.YYS/2021',
            'ass_name' =>'kursi siswa ke 3',
            'ass_price' => '5000000',
            'ass_condition' => 1,
            'ass_status' => 1


        ]);
        Asset::create([
            'ass_category_id' => '11',
            'ass_origin_id'     => '1',
            'ass_year'          => '2021',
            'ass_registration_code' => '004/P.2.4/INV.YYS/2021',
            'ass_name' =>'kursi siswa ke 4',
            'ass_price' => '5000000',
            'ass_condition' => 1,
            'ass_status' => 1


        ]);
    }
}
