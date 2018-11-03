<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChungChiNgoaiNguTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChungChiNgoaiNgu', function (Blueprint $table) {
            $table->increments('id_ChungChi');
			$table->string('TenChungChi');
			$table->integer('id_NgonNgu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ChungChiNgoaiNgu');
    }
}
