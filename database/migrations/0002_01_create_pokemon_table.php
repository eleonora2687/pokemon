<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('image')->nullable();
            $table->float('weight')->default(0);
            $table->float('height')->default(0);
            $table->json('types')->nullable();
            $table->integer('hp')->default(0);
            $table->integer('attack')->default(0);
            $table->integer('defense')->default(0);
            $table->integer('sp_attack')->default(0);
            $table->integer('sp_defense')->default(0);
            $table->integer('speed')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
