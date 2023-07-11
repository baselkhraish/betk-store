<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image'=> $this->faker->imageUrl(300,300),
            'url'=> $this->faker->url(),
            'title'=>$this->faker->words(5,true),
            'description'=>$this->faker->sentence(20),
        ];
    }
}
