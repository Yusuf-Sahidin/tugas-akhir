<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();

            $table->date('tanggal_sidang');
            $table->foreignId('daftar_id');
            $table->foreign('daftar_id')->references('id')->on('daftars')->onDelete('cascade');
            $table->foreignId('ruangan_id');
            $table->foreign('ruangan_id')->references('id')->on('ruangans')->onDelete('cascade');
            $table->foreignId('penguji_1');
            $table->foreign('penguji_1')->references('id')->on('dosens')->onDelete('cascade');
            $table->foreignId('penguji_2');
            $table->foreign('penguji_2')->references('id')->on('dosens')->onDelete('cascade');
            $table->foreignId('jurusan');
            $table->foreign('jurusan')->references('id')->on('jurusans')->onDelete('cascade');

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
        Schema::dropIfExists('jadwals');
    }
}
