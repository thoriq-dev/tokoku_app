<?php

namespace Modules\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductAttributesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Shop\App\Models\ProductAttribute::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
