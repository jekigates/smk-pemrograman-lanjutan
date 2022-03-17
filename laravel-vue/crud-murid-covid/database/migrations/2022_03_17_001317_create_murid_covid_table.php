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
        Schema::create('murid_covid', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->string('kelas');
            $table->string('tanggal_mulai_gejala');
            $table->enum('hasil_antigen', ['positif', 'negatif']);
            $table->enum('hasil_vcr', ['positif', 'negatif']);
            $table->text('gejala');
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
        Schema::dropIfExists('murid_covid');
    }
};
