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
        Schema::create('watchlists', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->boolean('is_private');
            $table->boolean('is_hidden');
            $table->string('identifier_id')->references('id')->on('identifiers');
            $table->string('watchlist_id')->references('id')->on('identifiers');
            $table->timestamps();
        });

        Schema::create('videos',  function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->string('string_id');
            $table->timestamps();
        });;

        Schema::create('watchlist_has_video',  function (Blueprint $table) {
            $table->foreignId('watchlist_id');
            $table->foreignId('video_id');
            $table->string('identifier_id')->references('id')->on('identifiers');
        });;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watchlists');
        Schema::dropIfExists('videos');
        Schema::dropIfExists('watchlist_has_video');
    }
};
