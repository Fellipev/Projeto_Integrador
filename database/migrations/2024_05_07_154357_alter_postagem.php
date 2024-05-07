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
           $table->dropColumn('url_img');
//           $table->string('url_img', 500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('postagem', function (Blueprint $table) {
           $table->string('url_img', 500);
//           $table->string('url_img', 500);
        });
    }
};
