<?php

use Illuminate\Database\Seeder;

class DonViTien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('donvitien')->truncate();
        DB::table('donvitien')->insert(['TenDonVi' => "$", 'id_QuocGia' =>477]);
		DB::table('donvitien')->insert(['TenDonVi' => "£", 'id_QuocGia' =>477]);
		DB::table('donvitien')->insert(['TenDonVi' => "¥", 'id_QuocGia' =>109]);
    }
}
