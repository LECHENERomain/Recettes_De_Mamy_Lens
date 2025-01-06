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
        Schema::create('compose', function (Blueprint $table) {
            $table->unsignedBigInteger('ingredient_id');
            $table->unsignedBigInteger('recette_id');
            $table->foreign('recette_id')->references('id')->on('recette')
                ->onDelete('cascade');
            $table->foreign('ingredient_id')->references('id')->on('ingredient')
                ->onDelete('cascade');
            $table->float('quantite');
            $table->string('observation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compose');
    }
};
