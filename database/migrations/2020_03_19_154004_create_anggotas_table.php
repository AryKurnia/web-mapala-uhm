<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nia', 20)->unique();
            $table->string('nama', 30);
            $table->string('angkatan', 30)->nullable();
            $table->enum('jurusan', ['TI','SK','SI','MI','KA']);
            $table->text('alamat')->nullable();
            $table->string('no_telp')->unique()->nullable();
            $table->text('ket')->nullable();
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('anggotas');
    }
}
