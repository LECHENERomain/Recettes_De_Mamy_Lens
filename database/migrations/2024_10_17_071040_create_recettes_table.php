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
        Schema::create('recettes', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable(false);
            $table->text('description')->nullable(false);
            $table->string('categorie')->nullable(false);
            $table->text('visuel');
            $table->integer('temps_preparation')->nullable(false);
            $table->integer('nb_personnes')->default(1)->nullable(false);
            $table->integer('cout')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recettes');
    }
};
