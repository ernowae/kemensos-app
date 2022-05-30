<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sesi_id')->constrained()->onDelete('cascade');
            $table->foreignId('lansia_id')->constrained()->onDelete('cascade');
            $table->integer('status_pengajuan');        //1 belum di proses, 2  pendamping, 3 pimpinan
            $table->string('nama_usaha');               // nama usaha yang akan di bangun jika menerima bantuan
            $table->integer('keputusan')->nullable();   //1 diterima, 2 ditolak
            $table->text('ktp');
            $table->text('kk');
            $table->text('penghasilan');                // surat keterangan penghasilan
            $table->text('pesan')->nullable();
            $table->date('diterima')->nullable();
            $table->date('ditolak')->nullable();

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
        Schema::dropIfExists('pengajuans');
    }
};
