<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name =$this->faker->words(5,true);
        return [
            'name'=>$name,
            'slug'=>str::slug($name),
            'description'=>$this->faker->sentence(15),
            'image'=> $this->faker->imageUrl(300,300),
            'price'=> $this->faker->randomFloat(1,1,499),
            'compar_price'=> $this->faker->randomFloat(1,500,999),
            'category_id'=>Category::inRandomOrder()->first()->id,
            'featured'=>rand(0,1),
        ];
    }
}
