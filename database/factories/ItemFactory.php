<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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
        return [
            'name' => $this->faker->name(),
            'category_id' => $this->faker->numberBetween(1, 2),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 1000, 100000),
            'img' => fake()->randomElement(
                [
                    'https://images.unsplash.com/photo-1591325418441-ff678baf78ef',
                    'https://images.unsplash.com/photo-1663569820326-fece03afdf1c',
                    'https://images.unsplash.com/photo-1611143669185-af224c5e3252',
                    'https://images.unsplash.com/photo-1727726672422-0fff852450f9'
                ]
            ),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
