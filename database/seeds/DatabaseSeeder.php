<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TaiKhoanSeeder::class);
        $this->call(QuocGia::class);
        $this->call(KhuVuc::class);
		$this->call(NgonNgu::class);
		$this->call(ChungChiNgoaiNgu::class);
		$this->call(NganhHoc::class);
		$this->call(TrangThai::class);
		$this->call(DonViTien::Class);
		$this->call(BacHoc::class);
		$this->call(LoaiHocBong::class);
		$this->call(LoaiSuKien::class);
		$this->call(TruongHoc::class);
    }
}
