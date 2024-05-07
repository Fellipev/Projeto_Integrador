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
        Schema::table('postagens', function (Blueprint $table) {
            $table->dropColumn('peso');
            $table->string('titulo', 200);
            $table->text('conteudo');
            $table->string('url_img', 500);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('postagens', function (Blueprint $table) {
           $table->decimal('peso', 8, 2);
           $table->dropColumn('titulo');
            $table->dropColumn('conteudo');
            $table->dropColumn('url_img');
        });
    }
};
