<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnKondisiToPerlengkapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perlengkapans', function (Blueprint $table) {
            $table->dropColumn('kondisi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perlengkapans', function (Blueprint $table) {
            $table->enum('kondisi', ['Baik', 'Buruk']);
        });
    }
}
