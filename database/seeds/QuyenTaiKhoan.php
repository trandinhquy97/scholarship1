<?php

use Illuminate\Database\Seeder;

class QuyenTaiKhoan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quyentaikhoan')->truncate();
        DB::table('quyentaikhoan')->insert(['id_QuyenTaiKhoan' => 1, 'TenQuyen' = > 'Sinh viên']);
        DB::table('quyentaikhoan')->insert(['id_QuyenTaiKhoan' => 2, 'TenQuyen' = > 'Tổ chức']);
        DB::table('quyentaikhoan')->insert(['id_QuyenTaiKhoan' => 3, 'TenQuyen' = > 'Nhân viên']);
        DB::table('quyentaikhoan')->insert(['id_QuyenTaiKhoan' => 4, 'TenQuyen' = > 'Người đăng tin']);
        DB::table('quyentaikhoan')->insert(['id_QuyenTaiKhoan' => 5, 'TenQuyen' = > 'Quản trị viên']);
        DB::table('quyentaikhoan')->insert(['id_QuyenTaiKhoan' => 6, 'TenQuyen' = > 'Kiểm duyệt viên']);
    }
}
