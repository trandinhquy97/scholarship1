<?php

use Illuminate\Database\Seeder;

class LoaiHocBong extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('loaihocbong')->truncate();
        DB::table('loaihocbong')->insert(['TenLoaiHb' => "Học bổng toàn phần"]);
		DB::table('loaihocbong')->insert(['TenLoaiHb' => "Học bổng bán phần"]);
		DB::table('loaihocbong')->insert(['TenLoaiHb' => "Định kỳ"]);
    }
}
