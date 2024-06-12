<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namaObat',50);
            $table->string('jenisObat',50);
            $table->Integer('dosis');
            $table->integer('harga');
            $table->date('tanggalProduksi');
            $table->date('tanggalKadaluarsa');
            $table->string('gambarObat',250);
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
        Schema::dropIfExists('obat');
    }
}
