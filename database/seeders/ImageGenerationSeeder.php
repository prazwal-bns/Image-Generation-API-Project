<?php

namespace Database\Seeders;

use App\Models\ImageGeneration;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ImageGenerationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageGenerations = [
            [
                'generated_prompt' => 'A serene sunset over a calm ocean with vibrant orange and pink hues reflecting on the water, silhouettes of palm trees in the foreground, peaceful and tranquil atmosphere',
                'original_file_name' => 'sunset_beach.jpg',
                'image_path' => 'uploads/images/sunset_beach_' . Str::random(10) . '.jpg',
                'file_size' => 2456789,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A majestic mountain range covered in snow, with dramatic clouds swirling around the peaks, golden hour lighting creating depth and contrast, alpine landscape',
                'original_file_name' => 'mountain_landscape.png',
                'image_path' => 'uploads/images/mountain_landscape_' . Str::random(10) . '.png',
                'file_size' => 3124567,
                'mime_type' => 'image/png',
            ],
            [
                'generated_prompt' => 'A bustling city street at night with neon signs, reflections on wet pavement, people walking with umbrellas, urban photography style, cinematic lighting',
                'original_file_name' => 'city_night.jpg',
                'image_path' => 'uploads/images/city_night_' . Str::random(10) . '.jpg',
                'file_size' => 1892345,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A close-up of a vibrant red rose with dewdrops on its petals, soft natural lighting, shallow depth of field, botanical photography',
                'original_file_name' => 'red_rose.jpg',
                'image_path' => 'uploads/images/red_rose_' . Str::random(10) . '.jpg',
                'file_size' => 1567890,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A cozy coffee shop interior with warm lighting, wooden furniture, bookshelves, steam rising from coffee cups, inviting and comfortable atmosphere',
                'original_file_name' => 'coffee_shop.jpg',
                'image_path' => 'uploads/images/coffee_shop_' . Str::random(10) . '.jpg',
                'file_size' => 2234567,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A futuristic space station orbiting Earth, with stars and nebula in the background, sci-fi aesthetic, detailed spacecraft design',
                'original_file_name' => 'space_station.png',
                'image_path' => 'uploads/images/space_station_' . Str::random(10) . '.png',
                'file_size' => 4567890,
                'mime_type' => 'image/png',
            ],
            [
                'generated_prompt' => 'A peaceful forest path with dappled sunlight filtering through green leaves, moss-covered trees, nature trail, serene and calming',
                'original_file_name' => 'forest_path.jpg',
                'image_path' => 'uploads/images/forest_path_' . Str::random(10) . '.jpg',
                'file_size' => 2789012,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A vintage car on a desert road, dust clouds behind it, dramatic sky with clouds, cinematic wide shot, retro aesthetic',
                'original_file_name' => 'vintage_car.jpg',
                'image_path' => 'uploads/images/vintage_car_' . Str::random(10) . '.jpg',
                'file_size' => 3456789,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A minimalist modern kitchen with white cabinets, natural light streaming through large windows, clean lines, contemporary design',
                'original_file_name' => 'modern_kitchen.jpg',
                'image_path' => 'uploads/images/modern_kitchen_' . Str::random(10) . '.jpg',
                'file_size' => 2123456,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A colorful abstract painting with flowing brushstrokes, vibrant blues, purples, and golds, artistic expression, dynamic composition',
                'original_file_name' => 'abstract_art.png',
                'image_path' => 'uploads/images/abstract_art_' . Str::random(10) . '.png',
                'file_size' => 3890123,
                'mime_type' => 'image/png',
            ],
            [
                'generated_prompt' => 'A cute golden retriever puppy playing in a field of wildflowers, soft focus background, joyful and playful mood, pet photography',
                'original_file_name' => 'puppy_field.jpg',
                'image_path' => 'uploads/images/puppy_field_' . Str::random(10) . '.jpg',
                'file_size' => 1678901,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A dramatic storm approaching over a wheat field, dark clouds with lightning, golden wheat swaying in the wind, moody atmosphere',
                'original_file_name' => 'storm_field.jpg',
                'image_path' => 'uploads/images/storm_field_' . Str::random(10) . '.jpg',
                'file_size' => 3012345,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A luxurious spa interior with stone walls, candles, warm lighting, relaxation area, zen and peaceful ambiance',
                'original_file_name' => 'spa_interior.jpg',
                'image_path' => 'uploads/images/spa_interior_' . Str::random(10) . '.jpg',
                'file_size' => 2345678,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A macro photograph of a butterfly on a flower, intricate wing patterns visible, vibrant colors, nature close-up, detailed focus',
                'original_file_name' => 'butterfly_macro.jpg',
                'image_path' => 'uploads/images/butterfly_macro_' . Str::random(10) . '.jpg',
                'file_size' => 1890123,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A modern office workspace with dual monitors, plants, minimalist desk setup, natural lighting, productive and organized environment',
                'original_file_name' => 'home_office.jpg',
                'image_path' => 'uploads/images/home_office_' . Str::random(10) . '.jpg',
                'file_size' => 2567890,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A traditional Japanese garden with koi pond, stone bridge, cherry blossoms, zen garden elements, peaceful and meditative',
                'original_file_name' => 'japanese_garden.jpg',
                'image_path' => 'uploads/images/japanese_garden_' . Str::random(10) . '.jpg',
                'file_size' => 3123456,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A street art mural on a brick wall, vibrant graffiti, urban art style, colorful and expressive, city culture',
                'original_file_name' => 'street_art.jpg',
                'image_path' => 'uploads/images/street_art_' . Str::random(10) . '.jpg',
                'file_size' => 2789012,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A cozy reading nook with bookshelves, comfortable armchair, warm lamp light, soft blankets, inviting and relaxing space',
                'original_file_name' => 'reading_nook.jpg',
                'image_path' => 'uploads/images/reading_nook_' . Str::random(10) . '.jpg',
                'file_size' => 2012345,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A tropical beach with crystal clear turquoise water, white sand, palm trees, paradise setting, vacation destination',
                'original_file_name' => 'tropical_beach.jpg',
                'image_path' => 'uploads/images/tropical_beach_' . Str::random(10) . '.jpg',
                'file_size' => 2678901,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A close-up of hands holding a steaming cup of coffee, morning light, cozy atmosphere, lifestyle photography, warm tones',
                'original_file_name' => 'coffee_hands.jpg',
                'image_path' => 'uploads/images/coffee_hands_' . Str::random(10) . '.jpg',
                'file_size' => 1456789,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A starry night sky over a desert landscape, Milky Way visible, silhouettes of cacti, astrophotography, breathtaking view',
                'original_file_name' => 'starry_night.jpg',
                'image_path' => 'uploads/images/starry_night_' . Str::random(10) . '.jpg',
                'file_size' => 4234567,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A modern minimalist bedroom with neutral colors, large windows, plants, Scandinavian design, clean and airy space',
                'original_file_name' => 'bedroom_minimal.jpg',
                'image_path' => 'uploads/images/bedroom_minimal_' . Str::random(10) . '.jpg',
                'file_size' => 2234567,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A chef preparing food in a professional kitchen, steam rising, ingredients arranged, culinary photography, vibrant colors',
                'original_file_name' => 'chef_cooking.jpg',
                'image_path' => 'uploads/images/chef_cooking_' . Str::random(10) . '.jpg',
                'file_size' => 2890123,
                'mime_type' => 'image/jpeg',
            ],
            [
                'generated_prompt' => 'A waterfall cascading through a lush green forest, mist and spray, natural beauty, landscape photography, serene nature scene',
                'original_file_name' => 'waterfall_forest.jpg',
                'image_path' => 'uploads/images/waterfall_forest_' . Str::random(10) . '.jpg',
                'file_size' => 3567890,
                'mime_type' => 'image/jpeg',
            ],
        ];

        foreach ($imageGenerations as $imageGeneration) {
            ImageGeneration::create([
                'user_id' => 1,
                'generated_prompt' => $imageGeneration['generated_prompt'],
                'image_path' => $imageGeneration['image_path'],
                'original_file_name' => $imageGeneration['original_file_name'],
                'file_size' => $imageGeneration['file_size'],
                'mime_type' => $imageGeneration['mime_type'],
            ]);
        }
    }
}

