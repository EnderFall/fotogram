<?php

namespace Database\Seeders;

use App\Models\GalleryLikeFoto;
use Illuminate\Database\Seeder;

class GalleryLikeFotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $likeList = [
            // Likes di foto John (1-4)
            ['FotoID' => 1, 'UserID' => 3],
            ['FotoID' => 1, 'UserID' => 4],
            ['FotoID' => 1, 'UserID' => 5],
            ['FotoID' => 2, 'UserID' => 3],
            ['FotoID' => 2, 'UserID' => 4],
            ['FotoID' => 2, 'UserID' => 5],
            ['FotoID' => 3, 'UserID' => 2],
            ['FotoID' => 3, 'UserID' => 4],
            ['FotoID' => 3, 'UserID' => 5],
            ['FotoID' => 4, 'UserID' => 2],
            ['FotoID' => 4, 'UserID' => 3],
            ['FotoID' => 4, 'UserID' => 5],

            // Likes di foto Jane (5-8)
            ['FotoID' => 5, 'UserID' => 2],
            ['FotoID' => 5, 'UserID' => 4],
            ['FotoID' => 5, 'UserID' => 5],
            ['FotoID' => 6, 'UserID' => 2],
            ['FotoID' => 6, 'UserID' => 3],
            ['FotoID' => 6, 'UserID' => 4],
            ['FotoID' => 7, 'UserID' => 2],
            ['FotoID' => 7, 'UserID' => 3],
            ['FotoID' => 7, 'UserID' => 5],
            ['FotoID' => 8, 'UserID' => 2],
            ['FotoID' => 8, 'UserID' => 3],
            ['FotoID' => 8, 'UserID' => 4],
            ['FotoID' => 8, 'UserID' => 5],

            // Likes di foto Mike (9-12)
            ['FotoID' => 9, 'UserID' => 2],
            ['FotoID' => 9, 'UserID' => 3],
            ['FotoID' => 9, 'UserID' => 5],
            ['FotoID' => 10, 'UserID' => 2],
            ['FotoID' => 10, 'UserID' => 3],
            ['FotoID' => 10, 'UserID' => 4],
            ['FotoID' => 10, 'UserID' => 5],
            ['FotoID' => 11, 'UserID' => 2],
            ['FotoID' => 11, 'UserID' => 3],
            ['FotoID' => 11, 'UserID' => 4],
            ['FotoID' => 11, 'UserID' => 5],
            ['FotoID' => 12, 'UserID' => 2],
            ['FotoID' => 12, 'UserID' => 3],
            ['FotoID' => 12, 'UserID' => 4],
            ['FotoID' => 12, 'UserID' => 5],

            // Likes di foto Sarah (13-16)
            ['FotoID' => 13, 'UserID' => 2],
            ['FotoID' => 13, 'UserID' => 3],
            ['FotoID' => 13, 'UserID' => 4],
            ['FotoID' => 13, 'UserID' => 5],
            ['FotoID' => 14, 'UserID' => 2],
            ['FotoID' => 14, 'UserID' => 3],
            ['FotoID' => 14, 'UserID' => 4],
            ['FotoID' => 14, 'UserID' => 5],
            ['FotoID' => 15, 'UserID' => 2],
            ['FotoID' => 15, 'UserID' => 3],
            ['FotoID' => 15, 'UserID' => 4],
            ['FotoID' => 16, 'UserID' => 2],
            ['FotoID' => 16, 'UserID' => 3],
            ['FotoID' => 16, 'UserID' => 4],
            ['FotoID' => 16, 'UserID' => 5],
        ];

        foreach ($likeList as $like) {
            GalleryLikeFoto::create($like);
        }
    }
}
