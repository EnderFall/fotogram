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
        Schema::create('gallery_likefotos', function (Blueprint $table) {
            $table->id('LikeID');
            $table->unsignedBigInteger('FotoID');
            $table->unsignedBigInteger('UserID');
            $table->timestamp('TanggalLike')->useCurrent();
            $table->foreign('FotoID')->references('FotoID')->on('gallery_fotos')->onDelete('cascade');
            $table->foreign('UserID')->references('UserID')->on('gallery_users')->onDelete('cascade');
            $table->unique(['FotoID', 'UserID']); // Satu user hanya bisa like foto sekali
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_likefotos');
    }
};
