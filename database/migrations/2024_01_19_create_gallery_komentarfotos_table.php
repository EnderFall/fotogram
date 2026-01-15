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
        Schema::create('gallery_komentarfotos', function (Blueprint $table) {
            $table->id('KomentarID');
            $table->unsignedBigInteger('FotoID');
            $table->unsignedBigInteger('UserID');
            $table->text('IsiKomentar');
            $table->timestamp('TanggalKomentar')->useCurrent();
            $table->foreign('FotoID')->references('FotoID')->on('gallery_fotos')->onDelete('cascade');
            $table->foreign('UserID')->references('UserID')->on('gallery_users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_komentarfotos');
    }
};
