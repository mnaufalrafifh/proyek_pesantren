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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id('id_tabelKegiatan');
            $table->string('nama_kegiatan');
            $table->date('tgl_kegiatan');
            $table->string('cover');
            $table->foreignId('id_kegiatan')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->constrained('kategori_kegiatans');
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
        Schema::dropIfExists('kegiatans');
    }
};
