<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           
               [
                'name'  => 'Imam Satya Wedhatama S.Tr.Stat.',
                'email' => 'imam.satya@bps.go.id',
                'password' => Hash::make('12341234'),
                'kabupaten_id' => 14
            ],
            [
                'name'  => 'BPS Banggai Kepulauan / BPS Banggai Laut',
                'email' => 'bps7201@bps.go.id',
                'password' => Hash::make('12341234'),
                'kabupaten_id' => 2
            ],
            [
                'name'  => 'BPS Banggai',
                'email' => 'bps7202@bps.go.id',
                'password' => Hash::make('12341234'),
                'kabupaten_id' => 1
            ],
            [
                'name'  => 'BPS Buol',
                'email' => 'bps7207@bps.go.id',
                'password' => Hash::make('12341234'),
                'kabupaten_id' => 4
            ],
            [
                'name'  => 'BPS Donggala',
                'email' => 'bps7205@bps.go.id',
                'password' => Hash::make('12341234'),
                'kabupaten_id' => 5
            ],
            [
                'name'  => 'BPS Morowali/Morowali Utara',
                'email' => 'bps7203@bps.go.id',
                'password' => Hash::make('12341234'),
                'kabupaten_id' => 6
            ],
            [
                'name'  => 'BPS Parigi Moutong',
                'email' => 'bps7208@bps.go.id',
                'password' => Hash::make('12341234'),
                'kabupaten_id' => 8
            ],
            [
                'name'  => 'BPS Poso',
                'email' => 'bps7204@bps.go.id',
                'password' => Hash::make('12341234'),
                'kabupaten_id' => 9
            ],
            [
                'name'  => 'BPS Sigi',
                'email' => 'bps7210@bps.go.id',
                'password' => Hash::make('12341234'),
                'kabupaten_id' => 10
            ],
            [
                'name'  => 'BPS Tojo Una-una',
                'email' => 'bps7209@bps.go.id',
                'password' => Hash::make('12341234'),
                'kabupaten_id' => 11
            ],
            [
                'name'  => 'BPS Toli-toli',
                'email' => 'bps7206@bps.go.id',
                'password' => Hash::make('12341234'),
                'kabupaten_id' => 12
            ],
            [
                'name'  => 'BPS Palu',
                'email' => 'bps7271@bps.go.id',
                'password' => Hash::make('12341234'),
                'kabupaten_id' => 13
            ],
            [
                'name'  => 'BPS Provinsi Sulawesi Tengah',
                'email' => 'bps7200@bps.go.id',
                'password' => Hash::make('12341234'),
                'kabupaten_id' => 13
            ],
        ]);
    }
}
