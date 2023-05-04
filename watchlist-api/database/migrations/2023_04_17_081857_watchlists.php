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
            $table->string('name');
            $table->boolean('is_private');
            $table->boolean('is_hidden');
            $table->string('reference');
            $table->uuid('created_by_identifier_id');
            $table->uuid('watchlist_identifier_id');
            $table->integer('videos_total');
            $table->timestamps();

            $table->foreign('created_by_identifier_id')->references('id')->on('identifiers');
            $table->foreign('watchlist_identifier_id')->references('id')->on('identifiers');
        });

        Schema::create('platforms',  function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('base_url');
            $table->integer('supported_length');
            $table->string('supported_format');
            $table->timestamps();
        });

        Schema::create('videos',  function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->foreignId('platform_id');
            $table->timestamps();
        });

        Schema::create('video_watchlist',  function (Blueprint $table) {
            $table->foreignId('watchlist_id');
            $table->foreignId('video_id');
            $table->uuid('created_by_identifier_id');
            $table->string('reference');

            $table->foreign('created_by_identifier_id')->references('id')->on('identifiers');
        });
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
