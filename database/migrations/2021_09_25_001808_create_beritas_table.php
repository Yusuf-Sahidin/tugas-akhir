<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();

            $table->string('judul');
            $table->date('tanggal_bimbingan');
            $table->text('isi_bimbingan');
            $table->string('status_bimbingan');
            $table->string('status_sidang');
            $table->foreignId('ta_id');
            $table->foreign('ta_id')->references('id')->on('tas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('beritas');
    }
}
