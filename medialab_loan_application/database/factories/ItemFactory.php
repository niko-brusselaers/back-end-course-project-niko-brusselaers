<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $width = random_int(200,600);
        $height = random_int(200,600);
        return [
            'name' => fake()->word(),
            'image'=> "https://picsum.photos/$width/$height",
            'manual'=> fake()->text(maxNbChars: 300),
            'comments' => fake()->text(maxNbChars: 300),
        ];
    }
}
