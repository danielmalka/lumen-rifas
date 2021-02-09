<?php

use App\Enums\StatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RifaParticipantesCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rifa_participantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rifa_valores_id');
            $table->string('nome_completo');
            $table->string('email');
            $table->enum('status', [
                StatusEnum::PENDENTE,
                StatusEnum::PAGO,
                StatusEnum::INATIVO
            ])->default(StatusEnum::PENDENTE);
            $table->timestamps();

            $table->foreign('rifa_valores_id')->references('id')->on('rifa_valores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rifa_participantes', function (Blueprint $table) {
            $table->dropForeign(['rifa_valores_id']);
        });
        Schema::dropIfExists('rifa_participantes');
    }
}
