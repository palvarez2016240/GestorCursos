<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Exercise;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ExerciseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exercise::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence();

        return [
            'nombre' => $name,
            'slug' => Str::slug($name, '-'),
            'descripcion' => $this->faker->text(200),
            'course_id' => Course::all()->random()->id
        ];
    }
}
