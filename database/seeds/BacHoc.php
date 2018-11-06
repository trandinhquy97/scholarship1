<?php

use Illuminate\Database\Seeder;

class BacHoc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bachoc')->delete();
		DB::table('bachoc')->insert(['TenBacHoc' => "Đại học"]);
        DB::table('bachoc')->insert(['TenBacHoc' => "Sau đại học"]);
        DB::table('bachoc')->insert(['TenBacHoc' => "Tiến sĩ"]);
		DB::table('bachoc')->insert(['TenBacHoc' => "Cử nhân"]);
		DB::table('bachoc')->insert(['TenBacHoc' => "Cao đẳng"]);
		DB::table('bachoc')->insert(['TenBacHoc' => "Nghiên cứu"]);
		DB::table('bachoc')->insert(['TenBacHoc' => "Sau Tiến sĩ"]);
		DB::table('bachoc')->insert(['TenBacHoc' => "Thạc sĩ"]);
		DB::table('bachoc')->insert(['TenBacHoc' => "Trung học phổ thông"]);
		DB::table('bachoc')->insert(['TenBacHoc' => "Trước Tiến sĩ"]);
    }
}
