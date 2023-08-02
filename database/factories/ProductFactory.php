<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_product' => $this->faker->name(),
            'img'=>'anhdep.jpg',
            'description' => 'day la description',
            'price' => 12082003,
            'soluong' => 03, 
            'category_id' => '2',
            'khuyenmai_id' =>'1',
        ];
    }
}