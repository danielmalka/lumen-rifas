<?php

use App\Enums\StatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RifasCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rifas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->longText('descricao');
            $table->unsignedTinyInteger('numeros');
            $table->string('video_url');
            $table->string('imagem_url');
            $table->enum('status', [
                StatusEnum::ATIVO,
                StatusEnum::INATIVO
            ])->default(StatusEnum::ATIVO);
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
        Schema::dropIfExists('rifas');
    }
}
