<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Laravel default user (commented out, using custom seeders below)
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Call all seeders
        $this->call([
            GalleryUserSeeder::class,
            GalleryAlbumSeeder::class,
            GalleryFotoSeeder::class,
            GalleryKomentarFotoSeeder::class,
            GalleryLikeFotoSeeder::class,
        ]);
    }
}
