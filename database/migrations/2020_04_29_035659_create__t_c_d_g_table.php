<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTCDGTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TCDG', function (Blueprint $table) {
            $table->increments('id_tcdg');
            $table->string('tieude');
            $table->text('noidung');
            $table->integer('tuoi');
            $table->integer('thang');
            $table->integer('tuan');
            $table->integer('diem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TCDG');
    }
}
