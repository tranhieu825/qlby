<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieudanhgiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieudanhgia', function (Blueprint $table) {
            $table->increments('id_pdg');
            $table->integer('id_phuhuynh');
            $table->string('hoten');
            $table->integer('tuoi');
            $table->integer('thang');
            $table->integer('tuan');
            $table->float('diem');
            $table->timestamps('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieudanhgia');
    }
}
