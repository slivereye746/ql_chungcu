<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@email.com',
            'password'=> Hash::make('admin')
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 01',
            'floor'=>1,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 02',
            'floor'=>1,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 03',
            'floor'=>1,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 04',
            'floor'=>1,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 05',
            'floor'=>1,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 06',
            'floor'=>1,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 07',
            'floor'=>1,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 08',
            'floor'=>1,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 09',
            'floor'=>1,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 10',
            'floor'=>1,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 11',
            'floor'=>2,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 12',
            'floor'=>2,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 13',
            'floor'=>2,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 14',
            'floor'=>2,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 15',
            'floor'=>2,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 16',
            'floor'=>2,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 17',
            'floor'=>2,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 18',
            'floor'=>2,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 19',
            'floor'=>2,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 20',
            'floor'=>2,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 21',
            'floor'=>3,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 22',
            'floor'=>3,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 23',
            'floor'=>3,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 24',
            'floor'=>3,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 25',
            'floor'=>3,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 26',
            'floor'=>3,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 27',
            'floor'=>3,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 28',
            'floor'=>3,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 29',
            'floor'=>3,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 30',
            'floor'=>3,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 31',
            'floor'=>4,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 32',
            'floor'=>4,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 33',
            'floor'=>4,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 34',
            'floor'=>4,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 35',
            'floor'=>4,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 36',
            'floor'=>4,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 37',
            'floor'=>4,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 38',
            'floor'=>4,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 39',
            'floor'=>4,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 40',
            'floor'=>4,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 41',
            'floor'=>5,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 42',
            'floor'=>5,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 43',
            'floor'=>5,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 44',
            'floor'=>5,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 45',
            'floor'=>5,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 46',
            'floor'=>5,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 47',
            'floor'=>5,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 48',
            'floor'=>5,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 49',
            'floor'=>5,
        ]);
        DB::table('apartments')->insert([
            'name'=>'Căn hộ 50',
            'floor'=>5,
        ]);
    }
}
