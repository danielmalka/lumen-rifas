<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RifaValoresCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rifa_valores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rifa_id');
            $table->longText('valor_referente');
            $table->unsignedTinyInteger('numero');
            $table->timestamps();

            $table->foreign('rifa_id')->references('id')->on('rifas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rifa_valores', function (Blueprint $table) {
            $table->dropForeign(['rifa_id']);
        });
        Schema::dropIfExists('rifa_valores');
    }
}
