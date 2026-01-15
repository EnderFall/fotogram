<?php

namespace Database\Seeders;

use App\Models\GalleryKomentarFoto;
use Illuminate\Database\Seeder;

class GalleryKomentarFotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $komentarList = [
            // Komentar di foto John (ID: 1-4)
            [
                'FotoID' => 1,
                'UserID' => 3,
                'IsiKomentar' => 'Foto yang sangat indah! Matahari pagi membuat suasana jadi magis.'
            ],
            [
                'FotoID' => 1,
                'UserID' => 4,
                'IsiKomentar' => 'Pemandangan seperti ini membuat saya ingin berlibur ke gunung segera.'
            ],
            [
                'FotoID' => 2,
                'UserID' => 5,
                'IsiKomentar' => 'Sempurna! Danau ini seperti cermin yang mencerminkan langit.'
            ],
            [
                'FotoID' => 2,
                'UserID' => 3,
                'IsiKomentar' => 'Komposisi dan lighting-nya luar biasa bagus!'
            ],
            [
                'FotoID' => 3,
                'UserID' => 4,
                'IsiKomentar' => 'Sunset yang menakjubkan! Kapan ini diambil?'
            ],
            [
                'FotoID' => 3,
                'UserID' => 5,
                'IsiKomentar' => 'Warna-warnanya sangat natural dan indah sekali.'
            ],
            [
                'FotoID' => 4,
                'UserID' => 3,
                'IsiKomentar' => 'Saya suka foto-foto alam seperti ini, sangat menenangkan.'
            ],

            // Komentar di foto Jane (ID: 5-8)
            [
                'FotoID' => 5,
                'UserID' => 2,
                'IsiKomentar' => 'Paris memang indah! Kapan kesana?'
            ],
            [
                'FotoID' => 5,
                'UserID' => 4,
                'IsiKomentar' => 'Sudah berkali-kali ke Paris tapi tetap terkagum-kagum.'
            ],
            [
                'FotoID' => 6,
                'UserID' => 2,
                'IsiKomentar' => 'Big Ben! Ini tempat favorit saya saat ke London.'
            ],
            [
                'FotoID' => 6,
                'UserID' => 5,
                'IsiKomentar' => 'Arsitektur Gothic yang indah dan megah sekali.'
            ],
            [
                'FotoID' => 7,
                'UserID' => 3,
                'IsiKomentar' => 'New York skyline adalah yang terbaik di dunia!'
            ],
            [
                'FotoID' => 7,
                'UserID' => 4,
                'IsiKomentar' => 'Sudah lama ingin ke New York, foto ini membuat saya makin pengen.'
            ],
            [
                'FotoID' => 8,
                'UserID' => 2,
                'IsiKomentar' => 'Tokyo adalah kota yang sangat menarik dan unik.'
            ],
            [
                'FotoID' => 8,
                'UserID' => 5,
                'IsiKomentar' => 'Jalanan yang ramai tapi tetap terorganisir dengan baik.'
            ],

            // Komentar di foto Mike (ID: 9-12)
            [
                'FotoID' => 9,
                'UserID' => 2,
                'IsiKomentar' => 'Portrait yang sangat profesional dan hasilnya sempurna!'
            ],
            [
                'FotoID' => 9,
                'UserID' => 3,
                'IsiKomentar' => 'Lighting dan composition-nya luar biasa, bisa minta rekomendasi?'
            ],
            [
                'FotoID' => 10,
                'UserID' => 5,
                'IsiKomentar' => 'Fashion shot yang elegan dan stylish!'
            ],
            [
                'FotoID' => 10,
                'UserID' => 3,
                'IsiKomentar' => 'Saya ingin hasil foto profesional seperti ini juga.'
            ],
            [
                'FotoID' => 11,
                'UserID' => 2,
                'IsiKomentar' => 'Lighting studio yang sempurna! Perbedaannya sangat terlihat.'
            ],
            [
                'FotoID' => 11,
                'UserID' => 4,
                'IsiKomentar' => 'Ini adalah hasil eksperimen yang sangat memuaskan.'
            ],
            [
                'FotoID' => 12,
                'UserID' => 3,
                'IsiKomentar' => 'Product photography yang sangat detail dan profesional!'
            ],
            [
                'FotoID' => 12,
                'UserID' => 5,
                'IsiKomentar' => 'Pencahayaannya bagus, produk terlihat sangat menarik.'
            ],

            // Komentar di foto Sarah (ID: 13-16)
            [
                'FotoID' => 13,
                'UserID' => 2,
                'IsiKomentar' => 'Hidangan ini terlihat sangat lezat dan menggugah selera!'
            ],
            [
                'FotoID' => 13,
                'UserID' => 4,
                'IsiKomentar' => 'Saya lapar lihat foto ini, kapan open restaurant?'
            ],
            [
                'FotoID' => 14,
                'UserID' => 3,
                'IsiKomentar' => 'Kue buatan sendiri yang terlihat profesional!'
            ],
            [
                'FotoID' => 14,
                'UserID' => 2,
                'IsiKomentar' => 'Topping dan dekorasinya sangat indah dan rapi.'
            ],
            [
                'FotoID' => 15,
                'UserID' => 4,
                'IsiKomentar' => 'Restoran ini terlihat nyaman untuk berkumpul dengan teman.'
            ],
            [
                'FotoID' => 15,
                'UserID' => 3,
                'IsiKomentar' => 'Atmosfernya sangat menyenangkan dan relaxing.'
            ],
            [
                'FotoID' => 16,
                'UserID' => 2,
                'IsiKomentar' => 'Minuman signature ini pasti enak dan unik!'
            ],
            [
                'FotoID' => 16,
                'UserID' => 5,
                'IsiKomentar' => 'Presentasi minumannya sangat Instagram-worthy!'
            ],
        ];

        foreach ($komentarList as $komentar) {
            GalleryKomentarFoto::create($komentar);
        }
    }
}
