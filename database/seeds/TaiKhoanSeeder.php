<?php

use Illuminate\Database\Seeder;
use App\TaiKhoan;

class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TaiKhoan')->delete();
        TaiKhoan::create(array(
            'username' => 'Doe',
            'email' => 'johndoe@example.net',
            'password' => Hash::make(12345),
            'kt_Quyen' => 1
        ));
    }
}
