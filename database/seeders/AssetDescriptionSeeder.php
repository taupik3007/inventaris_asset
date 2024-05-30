<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssetDescription;


class AssetDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AssetDescription::create([
            'asd_asset_id'  => '1',
            'asd_name'      => 'merk',
            'asd_value'     => 'josnbo'
        ],[
            'asd_asset_id'  => '1',
            'asd_name'      => 'bahan',
            'asd_value'     => 'kayu jati'
        ],[
            'asd_asset_id'  => '1',
            'asd_name'      => 'warna',
            'asd_value'     => 'Biru'
        ]);
        AssetDescription::create([
            'asd_asset_id'  => '2',
            'asd_name'      => 'merk',
            'asd_value'     => 'josnbo'
        ],[
            'asd_asset_id'  => '2',
            'asd_name'      => 'bahan',
            'asd_value'     => 'kayu jati'
        ],[
            'asd_asset_id'  => '2',
            'asd_name'      => 'warna',
            'asd_value'     => 'Biru'
        ]);
        AssetDescription::create([
            'asd_asset_id'  => '3',
            'asd_name'      => 'merk',
            'asd_value'     => 'josnbo'
        ],[
            'asd_asset_id'  => '3',
            'asd_name'      => 'bahan',
            'asd_value'     => 'kayu jati'
        ],[
            'asd_asset_id'  => '3',
            'asd_name'      => 'warna',
            'asd_value'     => 'Biru'
        ]);
    }
}
