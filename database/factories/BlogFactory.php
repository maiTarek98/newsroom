<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
use Str;
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'blog_name'  => $this->faker->name(),
            'slug' =>Str::slug($this->faker->name(), '-'),
            'blog_image' => 'https://source.unsplash.com/random',
            'blog_description'  => $this->faker->paragraph,
            'cover_image' => 'https://source.unsplash.com/random',
            'tags'  => $this->faker->name(),
            'category_id' =>Category::inRandomOrder()->first()->id,

        ];
    }
}
