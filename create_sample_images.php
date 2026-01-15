<?php
// Generate minimal valid JPEG files
$basePath = 'storage/app/public/fotos/';

// Create directory if not exists
@mkdir($basePath, 0755, true);

// Minimal JPEG hex data (1x1 pixel JPEG)
$jpegHex = "ffd8ffe000104a46494600010100000100010000ffdb004300080606070605080707070909080a0c140d0c0b0b0c1912130f141d1a1f1e1d1a1c1c20242e2720222c231c1c2837292c30313434341f27393d38323c2e333432ffc0000b080001000101011100ffc4001f0000010501010101010100000000000000000102030405060708090a0bffa00008010100000000" . str_repeat("00", 50) . "ffd9";

// Convert hex to binary
$jpegData = hex2bin($jpegHex);

// Create 16 sample files
for ($i = 1; $i <= 16; $i++) {
    $fileName = $basePath . 'sample' . $i . '.jpg';
    file_put_contents($fileName, $jpegData);
    echo "✓ Created: sample$i.jpg\n";
}

echo "\n✓ Semua 16 sample images berhasil dibuat di storage/fotos!\n";
?>
