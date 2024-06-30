<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIuranDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iuran_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('iuran_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bayar');
            $table->date('tanggal');
            $table->timestamps();

            $table->foreign('iuran_id')->references('id')->on('iurans')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iuran_detail');
    }
}
