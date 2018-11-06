<?php

use Illuminate\Database\Seeder;

class TruongHoc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('truonghoc')->delete();
        DB::table('truonghoc')->insert(['TenTruongHoc' => "Đại học Harvard", 'Logo' => "css/pictures/Harvard_shield-University.png", 'ThongTin' => "Viện Đại học Harvard, còn gọi là Đại học Harvard, là một viện đại học nghiên cứu tư thục, thành viên của Liên đoàn Ivy, ở Cambridge, Massachusetts, Hoa Kỳ. Với lịch sử, tầm ảnh hưởng, và tài sản của mình, Harvard là một trong những viện đại học danh tiếng nhất thế giới.", 'id_ThanhPho' => 231]);
    }
}
