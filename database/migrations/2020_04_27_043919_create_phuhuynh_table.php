<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhuhuynhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phuhuynh', function (Blueprint $table) {
            $table->increments('id_phuhuynh');
            $table->string('hoten');
            $table->string('email',100);
            $table->string('password');
            $table->date('namsinh');
            $table->string('sdt');
            $table->string('diachi');
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
        Schema::dropIfExists('phuhuynh');
    }
}
