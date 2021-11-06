<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Movie;
use Illuminate\Support\Str;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Movie::class;
    
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'description' => $this->faker->sentence,
            'rating' => $this->faker->numberBetween(1,10),
            'user_id'=>$this->faker->numberBetween(1, 5)
        ];
    }
}
