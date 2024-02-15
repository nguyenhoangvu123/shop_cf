<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name();
        return [
            'name_category' => $name,
            'slug_category' => Str::slug($name)
        ];
    }
}
