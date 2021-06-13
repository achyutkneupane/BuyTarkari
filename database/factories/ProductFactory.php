<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(2);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'unit' => $this->faker->randomElement(array('kg','l','pcs')),
            'price' => $this->faker->numberBetween(500, 9000),
            'discount_amount' => $this->faker->randomElement(array(null,$this->faker->numberBetween(30, 150))),
            'category_id' => $this->faker->numberBetween(1, 5),
            'brand_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
