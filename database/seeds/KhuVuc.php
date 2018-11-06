<?php

use Illuminate\Database\Seeder;

class KhuVuc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('khuvuc')->truncate();
        DB::table('khuvuc')->insert(['TenKhuVuc' => "Châu Á"]);
		DB::table('khuvuc')->insert(['TenKhuVuc' => "Châu Mỹ"]);
		DB::table('khuvuc')->insert(['TenKhuVuc' => "Châu Âu"]);
		DB::table('khuvuc')->insert(['TenKhuVuc' => "Châu Úc"]);
		DB::table('khuvuc')->insert(['TenKhuVuc' => "Châu Phi"]);
		DB::table('khuvuc')->insert(['TenKhuVuc' => "Thế Giới"]);
    }
}
