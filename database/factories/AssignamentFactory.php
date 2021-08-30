<?php

namespace Database\Factories;

use App\Models\Assignament;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AssignamentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Assignament::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => Course::all()->random()->id,
            'user_id' => Course::all()->random()->id,
            'nota' => $this->faker->numberBetween($min = 1, $max = 100)
        ];
    }
}
