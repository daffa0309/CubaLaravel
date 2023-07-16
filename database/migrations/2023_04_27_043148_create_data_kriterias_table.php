<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_kriterias', function (Blueprint $table) {
            $table->id('idKriteria');
            $table->string('nama');
            $table->string('sifat');
            $table->string('kode');

            $table->float('bobot')->nullable(); // nullable untuk ketika data belum
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_kriteriaas');
    }
}
