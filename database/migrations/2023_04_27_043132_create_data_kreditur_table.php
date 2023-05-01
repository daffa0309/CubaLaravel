<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKrediturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_kreditur', function (Blueprint $table) {
            $table->id('idKreditur');
            $table->string('name');
            $table->string('nik');
            $table->string('jeniskelamin');
            $table->string('telepon');
            $table->string('tanggalLahir');
            $table->string('tempatLahir');
            $table->string('pendidikanterakhir');
            $table->string('alasan');
            $table->integer('idKendaraan')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_kreditur');
    }
}
