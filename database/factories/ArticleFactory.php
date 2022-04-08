<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'body' => $this->faker->paragraph(10),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
