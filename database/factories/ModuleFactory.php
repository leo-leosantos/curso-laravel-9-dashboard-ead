<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Course;

use Illuminate\Database\Eloquent\Factories\Factory;

class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'course_id' => Course::factory(),
            'name' => $this->faker->unique()->name(),
        ];
    }
}
