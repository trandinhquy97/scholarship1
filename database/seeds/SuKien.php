<?php

use Illuminate\Database\Seeder;

class SuKien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sukien')->truncate();
		for($i = 0; $i < 100; $i++){
			DB::table('sukien')->insert(['id_NguoiDang'=>1, 'NgayTao' => "2018-11-01 00:00:00", 'AnhBia'=>'', 'TenSuKien'=>'Vietnam Web Summit', 'TieuDeBaiDang'=>'Vietnam Web Summit: Ngày hội của những kỳ lân công nghệ – sức mạnh kết nối và lan tỏa trí tuệ doanh nghiệp', 'id_LoaiSuKien'=>1, 'id_ThanhPho'=>1, 'ThoiGianBatDauDangKy'=>'2018-12-12', 'ThoiGianKetThucDangKy'=>'2018-12-12', 'ThoiGianBatDauSuKien' => "2018-11-01 00:00:00", 'ThoiGianKetThucSuKien' => "2018-11-01 00:00:00", 'DiaDiem'=>' TTHN Grand Palace', 'GiaiThuong'=>'', 'NoiDung'=>'Ngày hội của những kỳ lân công nghệ – sức mạnh kết nối và lan tỏa trí tuệ doanh nghiệp','LinkDangKy'=>'', 'NguonThongTin'=>'https://techtalk.vn/vietnam-web-summit-ngay-hoi-cua-nhung-ky-lan-cong-nghe-suc-manh-ket-noi-va-lan-toa-tri-tue-doanh-nghiep.html', 'id_MucBinhLuan'=>1, 'SoLuotQuanTam'=>0, 'id_TrangThaiTopic'=>1]);
			DB::table('sukien')->insert(['id_NguoiDang'=>1, 'NgayTao' => "2018-11-01 00:00:00", 'AnhBia'=>'', 'TenSuKien'=>'Hội nghị AI4Life về trí tuệ nhân tạo', 'TieuDeBaiDang'=>'Hội nghị AI4Life về trí tuệ nhân tạo', 'id_LoaiSuKien'=>2, 'id_ThanhPho'=>2, 'ThoiGianBatDauDangKy'=>'2018-12-12', 'ThoiGianKetThucDangKy'=>'2018-12-12', 'ThoiGianBatDauSuKien' => "2018-11-01 00:00:00", 'ThoiGianKetThucSuKien' => "2018-11-01 00:00:00", 'DiaDiem'=>' TTHN Grand Palace', 'GiaiThuong'=>'', 'NoiDung'=>'Ngày hội của những kỳ lân công nghệ – sức mạnh kết nối và lan tỏa trí tuệ doanh nghiệp','LinkDangKy'=>'', 'NguonThongTin'=>'https://ai4life.uet.vnu.edu.vn/call-for-techshows/', 'id_MucBinhLuan'=>2, 'SoLuotQuanTam'=>0, 'id_TrangThaiTopic'=>2]);	
		}
    }
}
