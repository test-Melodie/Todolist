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
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('texte');
            $table->boolean('termine');
            $table->timestamps();
        });
        Schema::table('todos', function (Blueprint $table) {
            $table->unsignedBigInteger('categorie_id')->nullable()->unsigned();
            $table->foreign('categorie_id')->references('id')->on('todos');
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
