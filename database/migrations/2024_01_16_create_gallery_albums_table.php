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
        Schema::create('gallery_albums', function (Blueprint $table) {
            $table->id('AlbumID');
            $table->string('NamaAlbum');
            $table->text('Deskripsi')->nullable();
            $table->timestamp('TanggalDibuat')->useCurrent();
            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('UserID')->on('gallery_users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_albums');
    }
};
