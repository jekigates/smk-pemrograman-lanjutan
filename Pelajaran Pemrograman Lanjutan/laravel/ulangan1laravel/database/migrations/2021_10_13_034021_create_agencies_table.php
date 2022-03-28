<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('jenis');
            $table->string('luas_tanah');
            $table->string('luas_bangunan');
            $table->bigInteger('lantai');
            $table->bigInteger('kamar_tidur');
            $table->bigInteger('kamar_mandi');
            $table->bigInteger('garasi');
            $table->string('air');
            $table->string('listrik');
            $table->string('hadap');
            $table->string('alamat');
            $table->bigInteger('harga');
            $table->string('marketing');
            $table->string('no_hp_marketing');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agencies');
    }
}
