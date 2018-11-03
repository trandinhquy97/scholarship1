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
    }
}
