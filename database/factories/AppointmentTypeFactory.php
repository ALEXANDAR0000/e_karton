<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AppointmentType;

class AppointmentTypeFactory extends Factory
{
    protected $model = AppointmentType::class;

    public function definition()
    {
        return [
            'name'        => $this->faker->sentence(2),
            'description' => $this->faker->paragraph(),
        ];
    }
}
