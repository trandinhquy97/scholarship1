<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDieuKienNgoaiNguTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DieuKienNgoaiNgu', function (Blueprint $table) {
            $table->increments('id_DkNgoaiNgu');
			$table->integer('id_HocBong');
			$table->integer('id_ChungChi');
			$table->integer('Diem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DieuKienNgoaiNgu');
    }
}
