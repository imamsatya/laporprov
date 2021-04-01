<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kabupatens')->insert([
            [
                'nama_kabupaten_kota' => 'Banggai',
                'kode_kabupaten_kota' => '7202',
            ],
            [
                'nama_kabupaten_kota' => 'Banggai Kepulauan',
                'kode_kabupaten_kota' => '7201',
            ],
            [
                'nama_kabupaten_kota' => 'Banggai Laut',
                'kode_kabupaten_kota' => '7201',
            ],
            [
                'nama_kabupaten_kota' => 'Buol',
                'kode_kabupaten_kota' => '7207',
            ],
            [
                'nama_kabupaten_kota' => 'Donggala',
                'kode_kabupaten_kota' => '7205',
            ],
            [
                'nama_kabupaten_kota' => 'Morowali',
                'kode_kabupaten_kota' => '7203',
            ],
            [
                'nama_kabupaten_kota' => 'Morowali Utara',
                'kode_kabupaten_kota' => '7203',
            ],
            [
                'nama_kabupaten_kota' => 'Parigi Moutong',
                'kode_kabupaten_kota' => '7208',
            ],
            [
                'nama_kabupaten_kota' => 'Poso',
                'kode_kabupaten_kota' => '7204',
            ],
            [
                'nama_kabupaten_kota' => 'Sigi',
                'kode_kabupaten_kota' => '7210',
            ],
            [
                'nama_kabupaten_kota' => 'Tojo Una-una',
                'kode_kabupaten_kota' => '7209',
            ],
            [
                'nama_kabupaten_kota' => 'Toli-toli',
                'kode_kabupaten_kota' => '7206',
            ],
            [
                'nama_kabupaten_kota' => 'Palu',
                'kode_kabupaten_kota' => '7271',
            ],
            [
                'nama_kabupaten_kota' => 'Provinsi',
                'kode_kabupaten_kota' => '7200',
            ]
        ]);
    }
}
