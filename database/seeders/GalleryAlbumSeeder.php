<?php

namespace Database\Seeders;

use App\Models\GalleryAlbum;
use Illuminate\Database\Seeder;

class GalleryAlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Albums untuk John Doe (UserID: 2)
        GalleryAlbum::create([
            'NamaAlbum' => 'Pemandangan Alam',
            'Deskripsi' => 'Koleksi foto pemandangan alam yang indah dari berbagai tempat',
            'UserID' => 2
        ]);

        GalleryAlbum::create([
            'NamaAlbum' => 'Sunset Moments',
            'Deskripsi' => 'Momen-momen saat matahari terbenam yang memukau',
            'UserID' => 2
        ]);

        // Albums untuk Jane Doe (UserID: 3)
        GalleryAlbum::create([
            'NamaAlbum' => 'Travel Diaries',
            'Deskripsi' => 'Catatan perjalanan saya ke berbagai negara',
            'UserID' => 3
        ]);

        GalleryAlbum::create([
            'NamaAlbum' => 'City Exploration',
            'Deskripsi' => 'Penjelajahan kota-kota besar dunia',
            'UserID' => 3
        ]);

        // Albums untuk Mike Smith (UserID: 4)
        GalleryAlbum::create([
            'NamaAlbum' => 'Professional Shots',
            'Deskripsi' => 'Koleksi foto profesional dari berbagai proyek',
            'UserID' => 4
        ]);

        GalleryAlbum::create([
            'NamaAlbum' => 'Studio Sessions',
            'Deskripsi' => 'Hasil dari sesi fotografi studio',
            'UserID' => 4
        ]);

        // Albums untuk Sarah Chen (UserID: 5)
        GalleryAlbum::create([
            'NamaAlbum' => 'Food Photography',
            'Deskripsi' => 'Koleksi foto makanan yang menggugah selera',
            'UserID' => 5
        ]);

        GalleryAlbum::create([
            'NamaAlbum' => 'Restaurant Reviews',
            'Deskripsi' => 'Dokumentasi restoran dan kafe favorit saya',
            'UserID' => 5
        ]);
    }
}
