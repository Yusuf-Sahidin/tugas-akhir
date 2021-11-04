<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftars', function (Blueprint $table) {
            $table->id();

            $table->string('email')->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('telepon');
            $table->string('pas_foto');
            $table->string('draft_ta');
            $table->float('ipk_sebelum_sidang');
            $table->date('tanggal_awal_bimbingan');
            $table->date('tanggal_akhir_bimbingan');
            $table->string('pembayaran');
            $table->string('akta_kelahiran');
            $table->string('kartu_keluarga');
            $table->string('tanda_pengenal');
            $table->string('ijazah_terakhir');
            $table->string('status_sidang');
            $table->foreignId('mahasiswa_id');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreignId('berita_id');
            $table->foreign('berita_id')->references('id')->on('beritas')->onDelete('cascade');
            $table->foreignId('dosen_id');
            $table->foreign('dosen_id')->references('id')->on('dosens')->onDelete('cascade');
            $table->foreignId('periode_id');
            $table->foreign('periode_id')->references('id')->on('periodes')->onDelete('cascade');
            $table->foreignId('jurusan_id');
            $table->foreign('jurusan_id')->references('id')->on('jurusans')->onDelete('cascade');

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
        Schema::dropIfExists('daftars');
    }
}
