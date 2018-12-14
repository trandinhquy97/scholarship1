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
		DB::table('trangthai')->truncate();
        DB::table('trangthai')->insert(['TenTrangThai' => "Đã duyệt"]);
		DB::table('trangthai')->insert(['TenTrangThai' => "Chưa duyệt"]);
		DB::table('trangthai')->insert(['TenTrangThai' => "Còn hạn"]);
		DB::table('trangthai')->insert(['TenTrangThai' => "Hết hạn"]);
        DB::table('trangthai')->insert(['TenTrangThai' => "Không duyệt"]);
        DB::table('trangthai')->insert(['TenTrangThai' => "Khóa"]);
    }
}
