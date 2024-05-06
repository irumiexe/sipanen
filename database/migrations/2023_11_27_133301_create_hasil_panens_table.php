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
        Schema::create('hasil_panens', function (Blueprint $table) {
            $table->id();
            $table->string('luas_lahan')->nullable();
            $table->string('kelompok_tani')->nullable();
            $table->string('alamat_ubinan')->nullable();
            $table->string('gkp')->nullable();
            $table->string('gkg')->nullable();
            $table->string('hasil_produksi')->nullable();
            $table->text('detail_hasil_produksi')->nullable();
            $table->string('url_lokasi')->nullable();
            $table->foreignId('kecamatan_id')->nullable();
            $table->foreignId('kelurahan_id')->nullable();
            $table->timestamps();
        });

        Schema::create('foto_hasil_panens', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->foreignId('hasil_panen_id')->nullable();
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
        Schema::dropIfExists('hasil_panens');
        Schema::dropIfExists('foto_hasil_panens');
    }
};
