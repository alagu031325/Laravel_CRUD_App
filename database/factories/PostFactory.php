<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'category_id' => rand(1,6),
            'image' => function () {
                // Get all image files in the specified directory
                $files = Storage::files('/uploads');  // Storage path for your images
            
                // Select a random file from the array
                $randomFile = $files[array_rand($files)];
            
                // Return just the file name with extension
                return 'storage/uploads/'.basename($randomFile);
            }
        ];
    }
}
