<?php

use Illuminate\Database\Seeder;

class TrangThai extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('trangthai')->delete();
        DB::table('trangthai')->insert(['TenTrangThai' => "Đã duyệt"]);
		DB::table('trangthai')->insert(['TenTrangThai' => "Chưa duyệt"]);
		DB::table('trangthai')->insert(['TenTrangThai' => "Còn hạn"]);
		DB::table('trangthai')->insert(['TenTrangThai' => "Hết hạn"]);
    }
}
