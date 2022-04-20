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
        Schema::create('tenaga_kerjas', function (Blueprint $table) {
            $table->id('id_tenagaKerja');
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->foreignId('id_jabatan')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->constrained('jabatans');
            $table->string('profile');
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
        Schema::dropIfExists('tenaga_kerjas');
    }
};
