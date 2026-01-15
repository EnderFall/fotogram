<?php
// Script untuk generate placeholder images di storage/fotos

$basePath = 'storage/app/public/fotos';
$colors = [
    [255, 107, 107], // Red
    [106, 168, 237], // Blue
    [129, 199, 132], // Green
    [255, 183, 77],  // Orange
    [186, 104, 200], // Purple
    [76, 175, 80],   // Lime
    [0, 188, 212],   // Cyan
    [244, 67, 54],   // Red
    [33, 150, 243],  // Blue
    [76, 175, 80],   // Green
    [255, 152, 0],   // Orange
    [156, 39, 176],  // Purple
    [233, 30, 99],   // Pink
    [63, 81, 181],   // Indigo
    [0, 150, 136],   // Teal
    [255, 87, 34],   // Deep Orange
];

// Create 16 placeholder images (sample1 to sample16)
for ($i = 1; $i <= 16; $i++) {
    $fileName = $basePath . '/sample' . $i . '.jpg';
    
    // Create image
    $image = imagecreatetruecolor(400, 300);
    
    // Get color for this image
    $colorIndex = ($i - 1) % count($colors);
    $rgb = $colors[$colorIndex];
    $color = imagecolorallocate($image, $rgb[0], $rgb[1], $rgb[2]);
    
    // Fill background
    imagefilledrectangle($image, 0, 0, 400, 300, $color);
    
    // Add text
    $textColor = imagecolorallocate($image, 255, 255, 255);
    $text = "Sample Image #" . $i;
    imagestring($image, 5, 150, 140, $text, $textColor);
    
    // Save image
    imagejpeg($image, $fileName, 85);
    imagedestroy($image);
    
    echo "Created: $fileName\n";
}

echo "✓ Semua sample images berhasil dibuat!\n";
?>
