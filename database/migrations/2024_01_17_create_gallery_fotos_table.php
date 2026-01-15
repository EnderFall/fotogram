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
        Schema::create('gallery_fotos', function (Blueprint $table) {
            $table->id('FotoID');
            $table->string('JudulFoto');
            $table->text('DeskripsiFoto')->nullable();
            $table->timestamp('TanggalUnggah')->useCurrent();
            $table->string('LokasiFile');
            $table->unsignedBigInteger('AlbumID');
            $table->unsignedBigInteger('UserID');
            $table->foreign('AlbumID')->references('AlbumID')->on('gallery_albums')->onDelete('cascade');
            $table->foreign('UserID')->references('UserID')->on('gallery_users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_fotos');
    }
};
