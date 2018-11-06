<?php

use Illuminate\Database\Seeder;

class LoaiSuKien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('loaisukien')->truncate();
        DB::table('loaisukien')->insert(['TenLoaiSuKien' => "Workshop"]);
		DB::table('loaisukien')->insert(['TenLoaiSuKien' => "Hackathon"]);
		DB::table('loaisukien')->insert(['TenLoaiSuKien' => "Seminar"]);
		DB::table('loaisukien')->insert(['TenLoaiSuKien' => "Talk Show"]);
		DB::table('loaisukien')->insert(['TenLoaiSuKien' => "Tech Talk"]);
		DB::table('loaisukien')->insert(['TenLoaiSuKien' => "Team Building"]);
    }
}
