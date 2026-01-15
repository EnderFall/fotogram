<?php

namespace Database\Seeders;

use App\Models\GalleryFoto;
use Illuminate\Database\Seeder;

class GalleryFotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fotoList = [
            // John's photos (AlbumID: 1, UserID: 2)
            [
                'JudulFoto' => 'Gunung di Pagi Hari',
                'DeskripsiFoto' => 'Pemandangan gunung yang indah saat pagi hari dengan kabut tipis',
                'LokasiFile' => 'fotos/sample1.jpg',
                'AlbumID' => 1,
                'UserID' => 2
            ],
            [
                'JudulFoto' => 'Danau yang Tenang',
                'DeskripsiFoto' => 'Danau dengan air yang sangat tenang dan jernih seperti cermin',
                'LokasiFile' => 'fotos/sample2.jpg',
                'AlbumID' => 1,
                'UserID' => 2
            ],
            [
                'JudulFoto' => 'Sunset di Pantai',
                'DeskripsiFoto' => 'Matahari terbenam yang spektakuler di tepi pantai',
                'LokasiFile' => 'fotos/sample3.jpg',
                'AlbumID' => 2,
                'UserID' => 2
            ],
            [
                'JudulFoto' => 'Langit Senja',
                'DeskripsiFoto' => 'Langit yang berwarna-warni saat senja tiba',
                'LokasiFile' => 'fotos/sample4.jpg',
                'AlbumID' => 2,
                'UserID' => 2
            ],

            // Jane's photos (AlbumID: 3, UserID: 3)
            [
                'JudulFoto' => 'Eiffel Tower Paris',
                'DeskripsiFoto' => 'Menara Eiffel yang ikonik di kota cahaya Paris',
                'LokasiFile' => 'fotos/sample5.jpg',
                'AlbumID' => 3,
                'UserID' => 3
            ],
            [
                'JudulFoto' => 'Big Ben London',
                'DeskripsiFoto' => 'Jam Big Ben yang terkenal di London dengan arsitektur Gothic',
                'LokasiFile' => 'fotos/sample6.jpg',
                'AlbumID' => 3,
                'UserID' => 3
            ],
            [
                'JudulFoto' => 'New York Skyline',
                'DeskripsiFoto' => 'Pemandangan skyline New York yang megah',
                'LokasiFile' => 'fotos/sample7.jpg',
                'AlbumID' => 4,
                'UserID' => 3
            ],
            [
                'JudulFoto' => 'Tokyo Streets',
                'DeskripsiFoto' => 'Jalanan Tokyo yang ramai dan penuh warna',
                'LokasiFile' => 'fotos/sample8.jpg',
                'AlbumID' => 4,
                'UserID' => 3
            ],

            // Mike's photos (AlbumID: 5, UserID: 4)
            [
                'JudulFoto' => 'Portrait Profesional',
                'DeskripsiFoto' => 'Foto potret profesional dengan lighting yang sempurna',
                'LokasiFile' => 'fotos/sample9.jpg',
                'AlbumID' => 5,
                'UserID' => 4
            ],
            [
                'JudulFoto' => 'Fashion Shot',
                'DeskripsiFoto' => 'Foto fashion dengan styling dan komposisi yang elegan',
                'LokasiFile' => 'fotos/sample10.jpg',
                'AlbumID' => 5,
                'UserID' => 4
            ],
            [
                'JudulFoto' => 'Studio Lighting Test',
                'DeskripsiFoto' => 'Eksperimen pencahayaan studio untuk hasil maksimal',
                'LokasiFile' => 'fotos/sample11.jpg',
                'AlbumID' => 6,
                'UserID' => 4
            ],
            [
                'JudulFoto' => 'Product Photography',
                'DeskripsiFoto' => 'Fotografi produk dengan detail dan pencahayaan profesional',
                'LokasiFile' => 'fotos/sample12.jpg',
                'AlbumID' => 6,
                'UserID' => 4
            ],

            // Sarah's photos (AlbumID: 7, UserID: 5)
            [
                'JudulFoto' => 'Hidangan Spesial',
                'DeskripsiFoto' => 'Hidangan istimewa yang terlihat sangat menggugah selera',
                'LokasiFile' => 'fotos/sample13.jpg',
                'AlbumID' => 7,
                'UserID' => 5
            ],
            [
                'JudulFoto' => 'Kue Lezat',
                'DeskripsiFoto' => 'Kue buatan sendiri yang indah dan lezat',
                'LokasiFile' => 'fotos/sample14.jpg',
                'AlbumID' => 7,
                'UserID' => 5
            ],
            [
                'JudulFoto' => 'Restoran Favorit',
                'DeskripsiFoto' => 'Interior restoran yang nyaman dan atmosfernya menyenangkan',
                'LokasiFile' => 'fotos/sample15.jpg',
                'AlbumID' => 8,
                'UserID' => 5
            ],
            [
                'JudulFoto' => 'Minuman Signature',
                'DeskripsiFoto' => 'Minuman unik dan signature dari kafe favorit',
                'LokasiFile' => 'fotos/sample16.jpg',
                'AlbumID' => 8,
                'UserID' => 5
            ],
        ];

        foreach ($fotoList as $foto) {
            GalleryFoto::create($foto);
        }
    }
}
