<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerlengkapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perlengkapans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->integer('jumlah');
            $table->string('merek');
            $table->string('warna');
            $table->enum('kondisi', ['Baik', 'Buruk']);
            $table->enum('jenis', ['Gunung Hutan', 'Panjat Tebing', 'Susur Gua', 'Kesekretariatan']);
            $table->string('gambar')->nullable();
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
        Schema::dropIfExists('perlengkapans');
    }
}
