<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DoctorType;

class DoctorTypeFactory extends Factory
{
    protected $model = DoctorType::class;

    public function definition()
    {
        return [
            'name' => $this->faker->jobTitle(),
        ];
    }
}
