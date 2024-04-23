<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('postagem_comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('postagem_id');
            $table->longText('comentario');
            $table->timestamps();

            $table->foreign('postagem_id')->references('id')->on('postagens');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('postagem_comentarios', function (Blueprint $table) {
            $table->dropForeign('postagem_comentarios_usuario_id_foreign');
            $table->dropForeign('postagem_comentarios_postagem_id_foreign');
        });
            Schema::dropIfExists('postagem_comentarios');
    }
};
