#!/usr/bin/env python3
from PIL import Image, ImageDraw
import os

# Create fotos directory
os.makedirs('storage/app/public/fotos', exist_ok=True)

colors = [
    (255, 107, 107), (106, 168, 237), (129, 199, 132), (255, 183, 77),
    (186, 104, 200), (76, 175, 80),   (0, 188, 212),   (244, 67, 54),
    (33, 150, 243),  (76, 175, 80),   (255, 152, 0),   (156, 39, 176),
    (233, 30, 99),   (63, 81, 181),   (0, 150, 136),   (255, 87, 34),
]

# Create 16 placeholder images
for i in range(1, 17):
    filename = f'storage/app/public/fotos/sample{i}.jpg'
    color = colors[(i - 1) % len(colors)]
    
    # Create image
    img = Image.new('RGB', (400, 300), color)
    draw = ImageDraw.Draw(img)
    
    # Add text
    text = f'Sample Image #{i}'
    draw.text((130, 140), text, fill=(255, 255, 255))
    
    # Save
    img.save(filename, quality=85)
    print(f'✓ Created {filename}')

print('\n✓ Semua 16 sample images berhasil dibuat!')
