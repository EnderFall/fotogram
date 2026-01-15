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
        Schema::create('gallery_users', function (Blueprint $table) {
            $table->id('UserID');
            $table->string('Username')->unique();
            $table->string('Password');
            $table->string('Email')->unique();
            $table->string('NamaLengkap');
            $table->text('Alamat')->nullable();
            $table->string('FotoProfile')->nullable();
            $table->text('Bio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_users');
    }
};
