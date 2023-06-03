<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKreditursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_krediturs', function (Blueprint $table) {
            $table->id('idKreditur');
            $table->string('name');
            $table->string('nik');
            $table->string('jeniskelamin');
            $table->string('telepon');
            $table->string('tanggalLahir');
            $table->string('tempatLahir');
            $table->string('ktpImage');
            $table->string('bpkbImage');
            $table->string('pendidikanterakhir');
            $table->string('alasan');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_krediturs');
    }
}
