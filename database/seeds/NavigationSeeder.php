<?php

use Illuminate\Database\Seeder;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Navigation::create([
            'nama' => 'Data Barang',
            'url' => 'konfigurasi',
            'icon'=> 'ti-settings',
            'main_menu'=> null,
        ]);
        Navigation::create([
            'nama' => 'kategori',
            'url' => 'konfigurasi/kategori',
            'icon'=> 'ti-settings',
            'main_menu'=> null,
        ]);
        Navigation::create([
            'nama' => 'satuan',
            'Kategori' => 'konfigurasi',
            'Satuan' => 'konfigurasi',
            'icon'=> 'ti-settings',
            'main_menu'=> null,
        ]);
    }
}
