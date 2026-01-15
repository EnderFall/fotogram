<?php

namespace Database\Seeders;

use App\Models\GalleryUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GalleryUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        GalleryUser::create([
            'Username' => 'admin',
            'Email' => 'admin@fotogram.com',
            'Password' => Hash::make('admin123'),
            'NamaLengkap' => 'Administrator',
            'Alamat' => 'Jalan Admin No. 1',
            'Bio' => 'Admin Fotogram - Mengelola platform',
            'role' => 'admin'
        ]);

        // Regular users
        GalleryUser::create([
            'Username' => 'johndoe',
            'Email' => 'john@example.com',
            'Password' => Hash::make('password123'),
            'NamaLengkap' => 'John Doe',
            'Alamat' => 'Jalan Merdeka No. 123',
            'Bio' => 'Photography enthusiast | Nature lover',
            'role' => 'user'
        ]);

        GalleryUser::create([
            'Username' => 'janedoe',
            'Email' => 'jane@example.com',
            'Password' => Hash::make('password123'),
            'NamaLengkap' => 'Jane Doe',
            'Alamat' => 'Jalan Sudirman No. 456',
            'Bio' => 'Travel blogger | Adventure seeker',
            'role' => 'user'
        ]);

        GalleryUser::create([
            'Username' => 'mikesmith',
            'Email' => 'mike@example.com',
            'Password' => Hash::make('password123'),
            'NamaLengkap' => 'Mike Smith',
            'Alamat' => 'Jalan Gatot Subroto No. 789',
            'Bio' => 'Professional photographer',
            'role' => 'user'
        ]);

        GalleryUser::create([
            'Username' => 'sarahchen',
            'Email' => 'sarah@example.com',
            'Password' => Hash::make('password123'),
            'NamaLengkap' => 'Sarah Chen',
            'Alamat' => 'Jalan Ahmad Yani No. 101',
            'Bio' => 'Food photographer | Foodie',
            'role' => 'user'
        ]);
    }
}
