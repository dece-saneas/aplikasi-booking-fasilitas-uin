<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FacilityUnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->citySuffix,
            'photo' => $this->faker->company . '.' . $this->faker->fileExtension,
            'description' => $this->faker->paragraphs(3, true),
            'facility_id' => $this->faker->numberBetween(1, $max = 20),
        ];
    }
}
